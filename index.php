<?php
    $title = "Liste des bars";
    require_once('header.php');
    
    // Connexion à la base de donnée
    $db = connexion();
    // Préparation de la requette : Selectionne tous les champs de la table bar
    $query = $db->prepare("SELECT * FROM bar");
    // Execution de la requette
    $query->execute();
    // Recuperation de la requette dans la variable $barList
    $barList = $query->fetchAll();
    
?>
    
    <main role="main" class="container">
    <!-- Boucle foreach pour afficher la liste des bars -->
    <?php foreach ($barList as $bar) : ?>
        <div>
            <!-- Lien vers la page d'un bar avec l'id de celui-ci passé dans l'URI -->
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
        <!-- Fin du foreach -->
    <?php endforeach ?>
    <!-- Lien vers la page d'ajout de bar -->
    <a href="formulaire.php">Ajouter un bar</a>
    </main>

<?php
    require_once('footer.php');
?>