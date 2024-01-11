<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connexion_bdd.php');

class User{
    //propriétés
    public $name;
    public $surname;
    public $email;
    public $password;
    public $password2;
    }

    $emailFalse = "<script>alert(\"L'adresse mail est déjà utilisée chez nous.\")</script>";
    $pswdFalse = "<script>alert(\"Les mots de passe sont différents.\")</script>";

if(!empty($_POST['name']) && !empty ($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['pswd']) && !empty($_POST['pswd2'])) {
        $user = new User();
        $user->name = $_POST['name'];
        $user->surname = $_POST['surname'];
        $user->email = $_POST['email'];
        $user->password = $_POST['pswd'];
        $user->password2 = $_POST['pswd2'];
        // var_dump($user);
        // var_dump affiche les valeurs de $user
        
        $sql = "SELECT * FROM `user` WHERE `email` = :email";
            $query=$db->prepare($sql);
            $query->bindValue(":email", $user->email, PDO::PARAM_STR);
            $query->execute();
            $verifEmail=$query->fetchAll();
            
            // verification pour savoir si l'adresse mail est déjà utilisée
            // var_dump($verifEmail);
        if ($_POST['pswd'] !== $_POST['pswd2']) {

            echo $pswdFalse;

        } else if ($verifEmail === true) {

            echo $emailFalse;
            
        } else {
                
            $sql='INSERT INTO `user` (`nom`, `prenom`,`email`, `mdp`)
            VALUES (:nom, :prenom, :email, :mdp)';
            $query=$db->prepare($sql);
            $query->bindValue(":nom", $user->name, PDO::PARAM_STR);
            $query->bindValue(":prenom", $user->surname, PDO::PARAM_STR);
            $query->bindValue(":email", $user->email, PDO::PARAM_STR);
            $hash=password_hash($user->password, PASSWORD_DEFAULT);
            $query->bindValue(":mdp", $hash, PDO::PARAM_STR);
          
            $query->execute();

            header('Location: connexion.php');
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
    <title>Inscrivez vous</title>
</head>
<body>
    <nav>
        <?php
        include('navbar.php');
        ?>
    </nav>
    <main>
    <div class="container" align="center"> 
      <div class="text-white">
        <div id="cardconec" class="rounded-5 card-body p-1 text-center" style="">
          <form action="" method="post">
            <h2 class="fw-bold">Inscrivez vous</h2>             
              
            <input type="text" id="typeTextX" class=" form-control form-control-lg" name="name" placeholder="Nom"/><br><br>

            <input type="text" id="typeTextX" class=" form-control form-control-lg" name="surname" placeholder="Prénom"/><br><br>
  
            <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" placeholder="Email"/><br><br>
 
            <input type="password" id="TypePasswordX" class="form-control form-control-lg" name="pswd" placeholder="Mot de passe"/><br><br>
                  
            <input type="password" id="TypePasswordX" class="form-control form-control-lg" name="pswd2" placeholder="Confirmer mot de passe"/><br><br>
             
            <button type="submit" class="btn btn-outline-dark btn-lg px-5">Envoyer</button>          
            <div>
            <p class="text-black">Vous avez déjà un compte?<br><a href="connexion.php" class="text-black bold">Se connecter</a></p>
            <?php
            $pswdFalse;
            $userFalse;
            ?>
            </form>
    </main>
    <footer>

    </footer>    
</body>
</html>