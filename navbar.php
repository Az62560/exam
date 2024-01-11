<?php
include('connexion_bdd.php');
?>
<br><div class="container-fluid">
    <div class="li">
    <a id="nav" href="index.php">Accueil</a>           
<?php
if (!isset($_SESSION['id'])) {

    echo '<a id="nav" href="inscription.php">Inscrivez vous</a>
    <a id="nav" href="connexion.php">Connectez vous</a>';
                
} else {

    echo '<a id="nav">Bienvenue ' . $_SESSION['prenom'] . '</a>
    <a id="nav" href="articles.php">Nos Articles</a>
    <a id="nav" href="ma_liste.php">Votre liste de souhaits</a>
    <a id="nav" href="deconnexion.php">Déconnexion</a>';

}           
?>       
    </div>
</div>