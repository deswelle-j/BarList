<?php
    $title = "Fiche";
    require_once('header.php');
    require_once('model/model.php');
    // Recuperation de l'id du bar depuis l'URI
    $id_bar = getInt('id');
   
    $page_error = [];

    // récupération des infos du bar
    if ($id_bar != 0) {
        $bar = getBar($id_bar);

        $productList = getProductListFromBar($id_bar);      
    }
    require_once('view/barView.php');
    // var_dump($bar);
    // var_dump($page_error);
    require_once('footer.php');
?>