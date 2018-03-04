    <!-- Affichage de la variable bar  -->
    <main role="main" class="container">
        <!-- Création d'un if pour ne pas afficher plusieurs fois les information sur le bar -->
        <h1>Fiche du bar N°<?php echo $id_bar; ?></h1>
        <div>
            <h2>Nom : <?= $bar['name']?></h2>   
            <ul>
                <li>adresse : <?= $bar['adresse']?></li>
                <li>Style : <?= $bar['style'] ?></li>
                <li>Note : <?= $bar['rating'] ?></li>
            </ul> 
            <!-- Lien vers la page d'ajout de produit pour le bar avec l'id du bar et son nom dans l'URI -->
            <a href="addproduct.php?id=<?= $id_bar ?>&amp;bar=<?= $bar['name']?>">Ajouter un produit au <?= $bar['name'] ?></a>
            <h3>Liste des produit disponible dans le bar</h3> 
            <?php foreach ($productList as $produit) : ?>
                <ul> 
                <li><?php echo $produit['nom'] . " : " . $produit['prix'] . " euros"?></li>
            </ul>
            <?php endforeach ?>

            
        </div>
        <a href="index.php">Retour à la liste des bars</a>
    </main>