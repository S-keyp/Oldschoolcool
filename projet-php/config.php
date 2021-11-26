<?php
// Informations d'identification

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'projet');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Connexion � la base de donn�es MySQL 
$conn = new PDO('mysql:host=localhost;dbname=projet;charset=utf8',
    'root', '', array(PDO::ATTR_PERSISTENT=>true));

// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>