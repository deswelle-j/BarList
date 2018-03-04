<?php
    $title = "Formulaire d'ajout de produit dans un bar";
    require_once('header.php');
    require_once('model/model.php');

    // Recuperation l'id du bar dans l'URI
    $id_bar = getInt('id');
    // Recuperation du nom du bar dans l'URI
    $bar = getValue('bar');
    $produits = listProduct(); 
    // Si le tableau POST n'est pas vide
    if(!empty($_POST)){

        // Recuperation de l'id du produit en int
        $produit = intval($_POST['produit']);
        // Recuperation de l'id du bar
        $id_bar = getInt('id');
        // Recuperation du prix en int
        $prix = intval($_POST['prix']);
        addProductToBar($id_bar, $produit ,$prix);
        // redirect('bar.php?id='.$id_bar);
    }
    require_once('view/addProductView.php');
    require_once('footer.php');
?>