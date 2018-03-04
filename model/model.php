<?php

function getNbBarFromDb(){
    $db = connexion();
    $query= $db->query('SELECT COUNT(*) AS nb from bar');
    $query->execute();
    $nb = $query->fetch();
    return $nb['nb'];
}


function getBarList($offset){
        // Connexion à la base de donnée
        $db = connexion();
        // Préparation de la requette : Selectionne tous les champs de la table bar
        $query = $db->prepare("SELECT * FROM bar LIMIT 3 OFFSET :offset");
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        // Execution de la requette
        $query->execute();
        // Recuperation de la requette dans la variable $barList
        $barList = $query->fetchAll();
        return $barList;
}

function getPage(){
    if (isset($_GET['page']) && !empty($_GET['page']) && ctype_digit($_GET['page'])) // On vérifie si la page est bien un nombre
    {
        $page = $_GET['page'];
    }
    else // Si le paramètre n'est pas spécifié ou n'est pas un nombre valide
    {
        $page = 1;
    }
    return $page;
}

function paging($uri, $page, $maxPage){
    if ($page > 1 ) // Seulement si on est sur la page 2 ou plus, afficher un bouton "Précédent"
    {
        echo '<a href="'.$uri.'?page='. ($page - 1) . '">Précédent </a>';
    }

    if ($page < $maxPage) // Seulement si on est pas sur la dernière page, afficher un bouton "Suivant"
    {
        echo '<a href="'.$uri.'?page=' . ($page + 1) .'">Suivant</a>';
    }
}