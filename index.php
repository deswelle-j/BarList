<?php
    $title = "Liste des bars";
    require_once('header.php');
    require_once('model/model.php');

    // Le numéro de la page que nous souhaitons visualiser
    $page = getPage();
    //calcul de l'offset de la page
    $offset = ($page - 1) * 3;
    // Recuperation de la liste de bar
    $barList = getBarList($offset);
    // Recuperation du nombre de bar
    $nbBar = getNbBarFromDb();
    // calcule du nombre de page à afficher
    $maxPage = ceil($nbBar / 3);
    //Fonction qui enregistre du code html pour le restituer plustard
    ob_start();
    paging('index.php', $page, $maxPage);
    $paging = ob_get_clean();
    
    require_once('view/indexView.php');
    require_once('footer.php');
?>
    


