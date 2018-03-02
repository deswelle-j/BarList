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
        <form action="addproduct.php" method="post">
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
        // $db = connexion();

        // Erreur dans la requette A CORRIGER !!!!

        // $query = $db->prepare("INSERT INTO barproduit(prix) VALUES(:prix)");
        // Insertion des valeurs retournées par le formulaire dans chacun des parametres
        // $query->bindValue(':id_bar', $id_bar, PDO::PARAM_INT);
        // $query->bindValue(':id_produit', $_POST['produit'], PDO::PARAM_INT);
        // $query->bindValue(':prix', $_POST['prix'], PDO::PARAM_INT);
        // Executer la requette
        // $query->execute();
        // Requette a faire pour inserer un produit a un bar 
        // SELECT * FROM barproduit 
        // JOIN produitON (id_produit = produit.id)
        // WHERE id_bar = :id 

        // redirect('index.php');
    }
    require_once('footer.php');
?>