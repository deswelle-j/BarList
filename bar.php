<?php
    $title = "Fiche";
    require_once('header.php');
    // Recuperation de l'id du bar depuis l'URI
    $id_bar = getInt('id');
   
    $page_error = [];

    // récupération des infos du bar
    if ($id_bar != 0) {
        $db = connexion();
        // Requette : selection les champs de la table bar ou id = le parametre id
        $query = $db->prepare("SELECT name, adresse, rating, style FROM bar WHERE id = :id");
        // Le parametre id prend la variable $id_bar et est un entier
        $query->bindValue(":id", $id_bar, PDO::PARAM_INT);
        $query->execute();
        // si la variable bar = false inserer 'bar inconu' dans le tableau
        if (!$bar = $query->fetch())
            $page_error[] = 'Bar inconnu';
    }

    var_dump($page_error);
?>
    <!-- Affichage de la variable bar  -->
    <main role="main" class="container">
        <h1>Fiche du bar N°<?php echo $id_bar; ?></h1>
        <div>
            <h2>Nom : <?= $bar['name']?></h2>   
            <ul>
                <li>adresse : <?= $bar['adresse']?></li>
                <li>Style : <?= $bar['style'] ?></li>
                <li>Note : <?= $bar['rating'] ?></li>
            </ul> 
            <!-- Lien vers la page d'ajout de produit pour le bar avec l'id du bar et son nom dans l'URI -->
            <a href="addproduct.php?id=<?= $id_bar ?>&amp;bar=<?= $bar['name']?>">Ajouter un produit au <?= $bar['name'] ?></a>
        </div>
    </main>

<?php
    require_once('footer.php');
?>