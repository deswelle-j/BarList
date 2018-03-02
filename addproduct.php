<?php
    $title = "Formulaire";
    require_once('header.php');

    function listProduct(){
        $db = connexion();
        $query = $db->prepare("SELECT id, nom FROM produit");
        $query->execute();
        $produits= $query->fetchAll();
        return $produits;
    }
    $produits = listProduct();
    
?>    
    <main>
    <div>
        <form action="formulaire.php" method="post">
            <!-- <label for="">Nom du bar :</label> -->

            <label for="">Nom du produit</label>
            <select id="monselect" name="style">
            
                <?php foreach ($produits as $produit) : ?>
                <option value="<?= $produit['id']?>"><?= $produit['nom']?></option> 
                <?php endforeach ?>
            </select>
            <label for="">Prix du produit</label>
            <input type="text" name="prix">
            <input type="submit">
        </form>
    </div>
    
    </main>

    <!-- SELECT * FROM barproduit 
    JOIN produitON (id_produit = produit.id)
    WHERE id_bar = :id -->


<?php
    if(!empty($_POST)){
        $db = connexion();
        $query = $db->prepare("INSERT INTO bar(name, adresse, rating, style) VALUES(:name, :adresse, :rating, :style)");
        $query->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $query->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
        $query->bindValue(':rating', $_POST['rating'], PDO::PARAM_INT);
        $query->bindValue(':style', $_POST['style'], PDO::PARAM_STR);
        $query->execute();

        redirect('index.php');
    }






    require_once('footer.php');
?>