<?php
    $title = "Formulaire d'ajout de produit";
    require_once('header.php');
    require_once('model/model.php');
    // Recuperation de l'id du bar
    $id_bar = getInt('id');
?>    

<?php
    // Si le tableau $_POST n'est pas vide effectuer la requette
    if(!empty($_POST)){
        // Recuperation du nom du produit
        $nom = $_POST['nom'];
        createProduct($nom);
        // Rediriger vers la page d'ajout du bar avec l'id de celui-ci pour pouvoir ajouter le prix de suite
        redirect('addproduct.php?id='.$id_bar);
    }
    
    require_once('view/creationProductView.php');
    require_once('footer.php');
?>