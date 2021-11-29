<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" />
<script src="https://kit.fontawesome.com/f12c8faf79.js" crossorigin="anonymous"></script>

</head>
<body>
<?php
require('config.php');

if (isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['mdp'])){

	$nom= $_POST['nom'];
	$prenom= $_POST['prenom'];	
	$pseudo= $_POST['pseudo'];
	$email= $_POST['email'];
	$mdp= $_POST['mdp'];
	$date_abo= date('Y-m-d');
	$request = $dbh -> prepare("INSERT into `utilisateurs` (nom, prénom, pseudo, email, mdp, date_abo) VALUES (:nom, :prenom, :pseudo, :email, :mdp, :date_abo)");
	$request -> execute(['nom'=>$nom,'prenom'=>$prenom, 'pseudo' => $pseudo, 'email' => $email, 'mdp' => $mdp, 'date_abo'=>$date_abo]);
		
	if($request){
			echo 	"<div class='form-card'>
					<h3>Vous êtes inscrit avec succès.</h3>
					<i class='far fa-check-circle' style='color:green; height:450px; width:450px; justify-content:center;'></i>
					<h4>Cliquez ici pour revenir à <a href='../index.php'> la page prioncipale. </a></h4>
					</div>";
	}
}
 
?>
</body>
</html>