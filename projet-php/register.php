<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./projet-php/rename.css" />
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
	$date_abo= date('%d,%m,%y');
	$request = $dbh -> prepare("INSERT into `utilisateurs` (nom, prénom, pseudo, email, mdp, date_abo) VALUES (:nom, :prenom, :pseudo, :email, :mdp, :date_abo)");
	$request -> execute(['nom'=>$nom,'prenom'=>$prenom, 'pseudo' => $pseudo, 'email' => $email, 'mdp' => $mdp, 'date_abo'=>$date_abo]);
	if($request){
		echo "<div class='sucess'>
				<h3>Vous êtes inscrit avec succès.</h3>
				<p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
				</div>";
		}
	}
	else{

?>
<form class="box" action="" method="post">
	<h1 class="box-logo box-title">Bienvenue</a></h1>
    <h2 class="box-title">S'inscrire</h2>
	<input type="text" class="box-input" name="nom" placeholder="Nom" required />
	<input type="text" class="box-input" name="prenom" placeholder="Prénom" required />
	<input type="text" class="box-input" name="pseudo" placeholder="Pseudo" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="mdp" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>