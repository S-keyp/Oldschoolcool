<?php

// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>