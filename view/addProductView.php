<main>
    <div>
        <form action="addproduct.php?id=<?= $id_bar ?>" method="post">
            <div>
                <!-- affichage du nom du bar avec la variable bar -->
                <label for="">Nom du bar : <?= $bar ?></label>
            </div>
            <div>
                <label for="">Nom du produit</label>
                <select id="monselect" name="produit">
                    <!-- Boucle qui affiche les produit dans le select -->
                    <?php foreach ($produits as $produit) : ?>
                    <!-- La valeur du select prend l'id du produit et l'affichage prend le nom -->
                    <option value="<?= $produit['id']?>"><?= $produit['nom']?></option> 
                    <!-- Fin boucle foreach -->
                    <?php endforeach ?>
                </select>
            </div> 
            <div>
                <label for="">Prix du produit</label>
                <input type="text" name="prix">
            </div>
            <input type="submit">
        </form>
    </div> 
    <div>  
        <a href="creationProduct.php?id=<?= $id_bar ?>">Ajouter un produit au formulaire</a>
    </div>
</main>