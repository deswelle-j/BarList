
<main role="main" class="container">
    <h1>Bienvenue sur BarList</h1>
    <h2>qui vous propose la iste des bars de la région ainsi que leurs cartes</h2>
    <div>
        <form action="index.php" method="post">
            <label for="filtre">Afficher par</label>
            <select name="filter" id="filtre">
                <option value="rating">note</option>
                <option value="name">nom</option>
            </select>
            <label for="order">dans l'ordre</label>
            <select name="order" id="order">
                <option value="DESC">descendant</option>
                <option value="ASC">ascendant</option>
            </select>
            <input type="submit">
        </form>

    </div>
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
        <!-- Resulat de la fonction de pagination -->
        <?= $paging ?>    
    </div>

</main>
