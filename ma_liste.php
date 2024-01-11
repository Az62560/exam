<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connexion_bdd.php');

$sql = 'SELECT * FROM article where id_user = :id';
$query = $db->prepare($sql);
$query->bindValue(':id', $_SESSION['id'], PDO::PARAM_STR);
$query->execute();
$affichage = $query->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($affichage as $key => $article) {
        if (isset($_POST['supp'.$key])) {
            $sql_delete = "DELETE FROM `article` WHERE id = :article_id AND id_user = :user_id";
            $query_delete = $db->prepare($sql_delete);
            $query_delete->bindValue(':article_id', $article['id'], PDO::PARAM_INT);
            $query_delete->bindValue(':user_id', $_SESSION['id'], PDO::PARAM_INT);
            $query_delete->execute();
            // Recharger la page pour afficher la mise à jour après la suppression
            header('Location: ma_liste.php');
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
    <title>Votre liste de préférence</title>
</head>
<body>
    <nav>
        <?php include('navbar.php'); ?>
    </nav>
    <main>
    <div class="container">
        <div class="row">
            <?php foreach ($affichage as $key => $results) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div style="height: 200px; overflow: hidden;">
                            <img src="<?= $results['image'] ?>" class="card-img-top img-fluid" alt="image du produit" style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $results['nom'] ?></h5>
                            <p class="card-text"><?= $results['description'] ?></p>
                            <p class="card-text">Prix : <?= $results['prix'] ?>€</p>
                            <form action="" method="post">
                                <input type="hidden" name="article_id" value="<?= $results['id'] ?>">
                                <button name="supp<?= $key ?>" type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
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
