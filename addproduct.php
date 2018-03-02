<?php
    $title = "Formulaire d'ajout de produit dans un bar";
    require_once('header.php');

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
        <form action="formulaire.php" method="post">
        <!-- A faire : recuperer l'id du bar -->
            <!-- <label for="">Nom du bar :</label> -->

            <label for="">Nom du produit</label>

            <select id="monselect" name="style">
                <!-- Boucle qui affiche les produit dans le select -->
                <?php foreach ($produits as $produit) : ?>
                <!-- La valeur du select prend l'id du produit et l'affichage prend le nom -->
                <option value="<?= $produit['id']?>"><?= $produit['nom']?></option> 
                <!-- Fin boucle foreach -->
                <?php endforeach ?>
            </select>

            <label for="">Prix du produit</label>
            <input type="text" name="prix">
            <input type="submit">
        </form>
    </div>
    
    </main>





<?php
    if(!empty($_POST)){
        $db = connexion();
        <!-- Requette a faire pour inserer un produit a un bar -->
        <!-- SELECT * FROM barproduit 
        JOIN produitON (id_produit = produit.id)
        WHERE id_bar = :id -->

        redirect('index.php');
    }






    require_once('footer.php');
?>