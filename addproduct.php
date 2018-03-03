<?php
    $title = "Formulaire d'ajout de produit dans un bar";
    require_once('header.php');

    // Recuperation l'id du bar dans l'URI
    $id_bar = getInt('id');
    // Recuperation du nom du bar dans l'URI
    $bar = getValue('bar');


    // Creation d'un fonction
    function listProduct(){
        $db = connexion();
        // Selectionne tous les champs de la table produit
        $query = $db->prepare("SELECT * FROM produit");
        $query->execute();
        // Recuperation du resultat de la requette dans le tableau produits
        $produits= $query->fetchAll();
        // Retourne le tableau produit en fin de fonction
        return $produits;
    }
    $produits = listProduct(); 
?>    
    <main>
    <div>
        <form action="addproduct.php?id=<?= $id_bar ?>" method="post">
            <div>
                <!-- affichage du nom du bar avec la variable bar -->
                <label for="">Nom du bar : <?= $bar ?></label>
            </div>
            <div>
            <label for="">Nom du produit</label>
            <select id="monselect" name="produit">
                <!-- Boucle qui affiche les produit dans le select -->
                <?php foreach ($produits as $produit) : ?>
                <!-- La valeur du select prend l'id du produit et l'affichage prend le nom -->
                <option value="<?= $produit['id']?>"><?= $produit['nom']?></option> 
                <!-- Fin boucle foreach -->
                <?php endforeach ?>
            </select>
            </div> 
            <div>
            <label for="">Prix du produit</label>
            <input type="text" name="prix">
            </div>
            <input type="submit">
        </form>
    </div> 
    </main>


<?php
    if(!empty($_POST)){
        var_dump($_POST);
        // Recuperation de l'id du produit en int
        $produit = intval($_POST['produit']);
        // Recuperation de l'id du bar
        $id_bar = getInt('id');

        $db = connexion();
        // Requete d'insertion dans la table barproduit 
        $query = $db->prepare("INSERT INTO barproduit(id_bar,id_produit, prix) VALUES(:bar, :produit, :prix)");
        // Insertion des valeurs retournées par le formulaire dans chacun des parametres
        $query->bindValue(':bar', $id_bar, PDO::PARAM_INT);
        $query->bindValue(':produit', $produit, PDO::PARAM_INT);
        $query->bindValue(':prix', $_POST['prix'], PDO::PARAM_INT);
        // Executer la requette
        $query->execute();
        redirect('bar.php?id='.$id_bar);
    }
    require_once('footer.php');
?>