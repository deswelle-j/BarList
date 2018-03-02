<?php
    $title = "Fiche";
    require_once('header.php');

    
    $page_error = [];

    // récupération des infos du bar
    // if ($id_bar != 0) {
        $db = connexion();
        $query = $db->prepare("SELECT id, name, adresse, rating, style FROM bar");
        $query->execute();
        $barList = $query->fetchAll();
        
    // }

    var_dump($page_error);
?>
    
    <main role="main" class="container">
    <?php foreach ($barList as $bar) : ?>
        <div>
            <h1><a href="bar.php?id=<?= $bar['id'] ?>">Fiche du bar N°<?= $bar['id'] ?> </a></h1>
            <div>
            <h2>Nom : <?= $bar['name']?></h2>   
            <ul>
                <li>adresse : <?= $bar['adresse']?></li>
                <li>Style : <?= $bar['style'] ?></li>
                <li>Note : <?= $bar['rating'] ?></li>
            </ul> 
            </div>        
        
        </div>
    <?php endforeach ?>
    <a href="formulaire.php">Ajouter un bar</a>
    </main>

<?php
    require_once('footer.php');
?>