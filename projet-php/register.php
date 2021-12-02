<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css" />
<script src="https://kit.fontawesome.com/f12c8faf79.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
<?php
require('config.php');
session_start();
if (isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['mdp'])){
	if(empty($_POST['email'])){
		$valid = false;
		$_SESSION['error'] = "Il faut mettre un mail";

	}elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $_POST['email'])){
		$valid = false;
		$_SESSION['error'] = "Le mail n'est pas valide";
	}elseif(empty($_POST['pseudo'])){
		$valid = false;
		$_SESSION['error'] = "Il faut mettre un pseudo";
	}else{
		$valid = true;
		$req = $dbh->prepare("SELECT id_utilisateurs FROM utilisateurs WHERE pseudo = :pseudo");
		$req->execute(['pseudo' => $_POST['pseudo']]);
		$row = $req->fetch();
		if($row) {
			$valid = false;
			$_SESSION['error'] = "Ce pseudo existe déjà";
		}else{
			$nom= $_POST['nom'];
			$prenom= $_POST['prenom'];	
			$pseudo= $_POST['pseudo'];
			$email= $_POST['email'];
			$mdp= $_POST['mdp'];
			$date_abo= date('Y-m-d');
			$request = $dbh -> prepare("INSERT into `utilisateurs` (nom, prénom, pseudo, email, mdp, date_abo) VALUES (:nom, :prenom, :pseudo, :email, :mdp, :date_abo)");
			$request -> execute(['nom'=>$nom,'prenom'=>$prenom, 'pseudo' => $pseudo, 'email' => $email, 'mdp' => $mdp, 'date_abo'=>$date_abo]);
				
			if(!$request){
				echo "Erreur d'enregistrement ";
			}else{
					echo 	"<div class='register-success'><div class='form-card'>
								<h3>Vous êtes inscrit avec succès.</h3>
					
								<h4>Cliquez ici pour revenir à <a href='../index2.php'> la page principale. </a></h4>
								</div>
							</div>";
			}
		}
	}
	if ($valid==false) {
		header('location:../inscription.php');
	}
}
 
?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="assets/js/index.js"></script>
</body>
</html>