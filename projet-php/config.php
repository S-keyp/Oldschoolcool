<?php
// Connexion à la base de données MySQL 
$dbh = new PDO('mysql:host=localhost;dbname=projet;charset=utf8',
'root', '', array(PDO::ATTR_PERSISTENT=>true));

// V�rifier la connexion
if($dbh === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>