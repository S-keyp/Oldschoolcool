<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="rename.css" />
</head>
<body>
<?php
require('config.php');
<<<<<<< HEAD
if (isset($_POST['pseudo'], $_POST['email'], $_POST['mdp'])){
<<<<<<< Updated upstream

	$email= $_POST['email'];
	$username= $_POST['$username'];
	$password= $_POST['password'];
	$request = $conn -> prepare("INSERT into `users` (pseudo, email, mdp) VALUES (:username, :email, :password)");
	$request -> execute(['username' => $username, 'email' => $email, 'password' => $password]);


=======
>>>>>>> Stashed changes
=======
if (isset($_REQUEST['pseudo'], $_REQUEST['email'], $_REQUEST['mdp'])){
>>>>>>> parent of f339188 (Update register.php)
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_POST['pseudo']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_POST'email']);
	$email = mysqli_real_escape_string($conn, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_POST['mdp']);
	$password = mysqli_real_escape_string($conn, $password);
	//requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (pseudo, email, mdp)
              VALUES ('$username', '$email', '$password')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
    }/* YEEEEEEEEEEET */
}else{
?>
<form class="box" action="" method="post">
	<h1 class="box-logo box-title">Bienvenue</a></h1>
    <h2 class="box-title">S'inscrire</h2>
	<input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="mdp" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>