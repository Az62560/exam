<?php
session_start();

if(!isset($_SESSION['id'])){
    header('Location:index.php');
    exit(); // Ajout de exit() après la redirection pour terminer le script
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connexion_bdd.php');

$sql = 'SELECT l.*
        FROM liste l
        LEFT JOIN article a ON l.nom = a.nom AND a.id_user = :id_user
        WHERE a.id_user IS NULL';

$query = $db->prepare($sql);
$query->bindValue(':id_user', $_SESSION['id'], PDO::PARAM_STR);
$query->execute();
$affichage = $query->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($affichage as $key => $article) {
        if(isset($_POST['add'.$key])) {
            $sql = "INSERT INTO `article` (`id_user`, `nom`, `description`, `image`, `prix`) VALUES (:id_user, :nom, :descr, :img, :prix)";
            $query = $db->prepare($sql);
            $query->bindValue(":id_user", $_SESSION['id'], PDO::PARAM_STR);
            $query->bindValue(":nom", $article['nom'], PDO::PARAM_STR);
            $query->bindValue(":descr", $article['description'], PDO::PARAM_STR);
            $query->bindValue(":img", $article['image'], PDO::PARAM_STR);
            $query->bindValue(":prix", $article['prix'], PDO::PARAM_STR);
            $query->execute();
            header('Location: articles.php');
            exit(); // Terminer le script après la redirection
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Ici on choisit ses vêtements</title>
</head>
<body>
    <nav>
        <?php include('navbar.php'); ?>
    </nav>
    <main>
    <div class="container">
        <div class="row">
            <?php foreach ($affichage as $key => $article) { ?>
                <div class="col-md-4 mb-4">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="<?= $article['image'] ?>" class="card-img-top img-fluid" alt="image du produit" style="object-fit: cover; width: 100%; height: 100%;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['nom'] ?></h5>
                        <p class="card-text"><?= $article['description'] ?></p>
                        <p class="card-text">Prix : <?= $article['prix'] ?>€ TTC</p>
                        <form action="" method="post">
                            <button name="add<?= $key ?>" type="submit" class="btn btn-primary">Ajouter à ma liste</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

    <footer>

    </footer>
</body>
</html>