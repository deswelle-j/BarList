<?php
    $title = "Fiche";
    require_once('header.php');
    // Recuperation de l'id du bar depuis l'URI
    $id_bar = getInt('id');
   
    $page_error = [];

    // récupération des infos du bar
    if ($id_bar != 0) {
        $db = connexion();
        // -- Ancienne requete --
        // Requette : selection les champs de la table bar ou id = le parametre id
        // $query = $db->prepare("SELECT bar.name, bar.adresse, bar.rating, bar.style FROM bar  WHERE id = :id");

        // Requete select qui recupere le bar , la liste des produits et leurs prix
        $query = $db->prepare("SELECT bar.name, bar.adresse, bar.rating, bar.style, produit.nom, barproduit.prix FROM bar 
            JOIN barproduit ON bar.id = barproduit.id_bar 
            JOIN produit ON produit.id = barproduit.id_produit 
            WHERE bar.id = :id"); 
        // Le parametre id prend la variable $id_bar et est un entier
        $query->bindValue(":id", $id_bar, PDO::PARAM_INT);
        $query->execute();
        // si la variable bar = false inserer 'bar inconu' dans le tableau
        if (!$bar = $query->fetchAll())
            $page_error[] = 'Bar inconnu';
   
        $query->closeCursor();
    }
    // var_dump($bar);

    var_dump($page_error);
    $i = 0;
?>
    <!-- Affichage de la variable bar  -->
    <main role="main" class="container">
        <?php foreach ($bar as $produit) : ?>
        <?php if ($i == 0) : ?>
        <h1>Fiche du bar N°<?php echo $id_bar; ?></h1>
        <div>
        
            <h2>Nom : <?php $produit['name']?></h2>   
            <ul>
                <li>adresse : <?= $produit['adresse']?></li>
                <li>Style : <?= $produit['style'] ?></li>
                <li>Note : <?= $produit['rating'] ?></li>
            </ul> 
            <a href="addproduct.php?id=<?= $id_bar ?>&amp;bar=<?= $produit['name']?>">Ajouter un produit au <?= $produit['name'] ?></a>
            <h3>Liste des produit disponible dans le bar</h3>
            <!-- Lien vers la page d'ajout de produit pour le bar avec l'id du bar et son nom dans l'URI -->
            <ul>
            <?php endif ?>
                <li>Nom produit : <?= $produit['nom'] ?></li>
                <li>Prix : <?= $produit['prix'] ?></li>
            <?php $i++ ?>
            <?php endforeach ?>
            </ul>
        </div>
    </main>

<?php
    require_once('footer.php');
?>