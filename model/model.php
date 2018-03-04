<?php

function getNbBarFromDb(){
    $db = connexion();
    $query= $db->query('SELECT COUNT(*) AS nb from bar');
    $query->execute();
    $nb = $query->fetch();
    return $nb['nb'];
}

function getBarList($offset, $filter, $order){
        // Connexion à la base de donnée
        $db = connexion();
        // Préparation de la requette : Selectionne tous les champs de la table bar
        $query = $db->prepare("SELECT * FROM bar ORDER BY $filter $order LIMIT 3 OFFSET :offset");
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        // Execution de la requette
        $query->execute();
        // Recuperation de la requette dans la variable $barList
        $barList = $query->fetchAll();
        return $barList;
}

function getBar($id_bar){
    $db = connexion();
    // Requette : selection les champs de la table bar ou id = le parametre id
    $query = $db->prepare("SELECT * FROM bar WHERE id = :id");
    $query->bindValue(':id', $id_bar, PDO::PARAM_INT);
    $query->execute();
    $bar = $query->fetch();
    $query->closeCursor();
    return $bar;
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

function getProductListFromBar($id_bar){
    $db = connexion();
    $query = $db->prepare("SELECT produit.nom, barproduit.prix FROM barproduit
    JOIN produit ON produit.id = barproduit.id_produit 
    WHERE barproduit.id_bar = :id"); 
    // Le parametre id prend la variable $id_bar et est un entier
    $query->bindValue(":id", $id_bar, PDO::PARAM_INT);
    $query->execute();
    $productList = $query->fetchAll();
    return $productList;
}