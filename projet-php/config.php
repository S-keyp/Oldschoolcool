<?php
// Informations d'identification

 
// Connexion � la base de donn�es MySQL 
$conn = new PDO('mysql:host=localhost;dbname=projet;charset=utf8',
    'root', '', array(PDO::ATTR_PERSISTENT=>true));

// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>