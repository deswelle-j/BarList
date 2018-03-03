<?php
    $title = "Formulaire d'ajout de produit";
    require_once('header.php');
    // Recuperation de l'id du bar
    $id_bar = getInt('id');
?>    
    <main>
        <div>
            <form action="creationProduct.php?id=<?= $id_bar ?>" method="post">
                <label for="">Nom du produit à ajouter:</label>
                <input type="text" name="nom">
                <input type="submit">
            </form>
        </div>   
    </main>

<?php
    // Si le tableau $_POST n'est pas vide effectuer la requette
    if(!empty($_POST)){
        $db = connexion();
        // Inserer dans la table produit au champ nom le parametre renvoyé par le formulaire
        $query = $db->prepare("INSERT INTO produit(nom) VALUE(:nom)");
        $query->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        // Executer la requette
        $query->execute();
        // Rediriger vers la page d'ajout du bar avec l'id de celui-ci pour pouvoir ajouter le prix de suite
        redirect('addproduct.php?id='.$id_bar);
    }

    require_once('footer.php');
?>