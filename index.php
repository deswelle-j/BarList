<?php
    $title = "Liste des bars";
    require_once('header.php');
    require_once('model/model.php');

    if(!empty($_POST)){
        $filter = $_POST['filter'];
        $order = $_POST['order'];

    }else {
        $filter = 'id';
        $order = 'ASC';
    }

    // Le numéro de la page que nous souhaitons visualiser
    $page = getPage();
    //calcul de l'offset de la page
    $offset = ($page - 1) * 3;
    // Recuperation de la liste de bar
    $barList = getBarList($offset, $filter, $order);
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
    


