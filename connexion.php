<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connexion_bdd.php');

if (!empty($_POST['email']) && !empty($_POST['pswd'])) {
    $sql = "SELECT * FROM `user` WHERE `email` = :email";
    $query = $db->prepare($sql);
    $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
    $query->execute();
    $requete = $query->fetch();
    // var_dump($requete);
    $verify=password_verify($_POST["pswd"], $requete["mdp"]);

    if($requete['email'] === $_POST['email'] && $verify === true) {

        echo("Connexion réussie");
        header('Location: index.php');
        echo $requete["id"];
          session_start();
          $_SESSION["id"] = $requete["id"];
          $_SESSION["nom"] = $requete["nom"];
          $_SESSION['prenom'] = $requete['prenom'];
          $_SESSION['email'] = $requete['email'];

    }else{

        echo 'connexion échouée !';

    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Connectez vous</title>
</head>
<body>
    <nav>
        <?php
        include('navbar.php');
        ?>
    </nav>
    <main>
    <div class="container" align="center">
    <div class="row d-flex align-items-center h-75" >
        <div class="text-white" >
          <div  class=" rounded-5 card-body align-items-center p-5 text-center" style="">
            <form action="" method="post">
              <h2 class="">Entrez vos identifiants</h2><br>
                  
                <input type="text" id="typeEmailX" class=" form-control form-control-lg" name="email" placeholder="Email"/><br><br>

                <input type="text" id="typePasswordX" class=" form-control form-control-lg" name="pswd" placeholder="Mot de passe"/><br><br>
                                  
                <button type="submit" class="btn btn-outline-dark btn-lg px-5">Se connecter</button>

                <p class="text-black">Pas encore de compte?<br><a href="inscription.php" class="text-black bold">S'inscrire</a></p>
                
            </form>           
          </div>
        </div>                    
      </div>      
    </div>         

    </main>
    <footer>

    </footer>    
</body>
</html>