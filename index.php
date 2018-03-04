<?php
    $title = "Liste des bars";
    require_once('header.php');

    $page; // Le numéro de la page que nous souhaitons visualiser
    if (isset($_GET['page']) && !empty($_GET['page']) && ctype_digit($_GET['page'])) // On vérifie si la page est bien un nombre
    {
        $page = $_GET['page'];
    }
    else // Si le paramètre n'est pas spécifié ou n'est pas un nombre valide
    {
        $page = 1;
    }
    // Maintenant, nous avons le numéro de page. Nous pouvons en déduire les enregistrements à afficher :
    $offset = ($page - 1) * 3;   
    // Connexion à la base de donnée
    $db = connexion();
    // Préparation de la requette : Selectionne tous les champs de la table bar
    $query = $db->prepare("SELECT * FROM bar LIMIT 3 OFFSET :offset");
    $query->bindValue(':offset', $offset, PDO::PARAM_INT);
    // Execution de la requette
    $query->execute();
    // Recuperation de la requette dans la variable $barList
    $barList = $query->fetchAll();
    $nbBar = getNbBarFromDb();
    $maxPage = ceil($nbBar / 3);
?>
    
    <main role="main" class="container">
    <h1>Bienvnue sur BarList</h1>
    <h2>qui vous propose la iste des bars de la région ainsi que leurs cartes</h2>
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
    <div>
        <a href="formulaire.php">Ajouter un bar</a>    
    </div>
    <div>
    <?php 
        if ($page > 1 ) // Seulement si on est sur la page 2 ou plus, afficher un bouton "Précédent"
        {
            echo '<a href="index.php?page='. ($page - 1) . '">Précédent </a>';
        }
    
        if ($page < $maxPage) // Seulement si on est pas sur la dernière page, afficher un bouton "Suivant"
        {
            echo '<a href="index.php?page=' . ($page + 1) .'">Suivant</a>';
        }
    ?>    
    </div>

    </main>

<?php
    require_once('footer.php');
?>