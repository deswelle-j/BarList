<?php
    $title = "Formulaire";
    require_once('header.php');
?>    
    <main>
    <div>
        <form action="formulaire.php" method="post">
            <label for="">Nom du bar :</label>
            <input type="text" name="name">
            <label for="">adresse</label>
            <input type="text"name="adresse">
            <label for="">style</label>
            <select id="monselect" name="style">
                <option value="Bistrot">Bistrot</option> 
                <option value="Sport">Sport</option>
                <option value="Lounge">Lounge</option>
            </select>
            <label for="">Rating</label>
            <input type="text" name="rating">
            <input type="submit">
        </form>
    </div>
    
    </main>


<?php
    if(!empty($_POST)){
        $db = connexion();
        $query = $db->prepare("INSERT INTO bar(name, adresse, rating, style) VALUES(:name, :adresse, :rating, :style)");
        $query->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $query->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
        $query->bindValue(':rating', $_POST['rating'], PDO::PARAM_INT);
        $query->bindValue(':style', $_POST['style'], PDO::PARAM_STR);
        $query->execute();

        redirect('index.php');
    }






    require_once('footer.php');
?>