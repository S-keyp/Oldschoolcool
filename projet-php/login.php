<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="rename.css" />
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['pseudo'])){
	$username = stripslashes($_REQUEST['pseudo']);
	$username = mysqli_real_escape_string($conn, $username);
	$password = stripslashes($_REQUEST['mdp']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `membres` WHERE pseudo='$username' and mdp='$password'";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
		if($rows==1){
			$_SESSION['pseudo'] = $username;
			header("Location: index.php");
		}else{
			$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
		}
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title">Bienvenue</a></h1>
<h2 class="box-title">Connexion</h2>
<input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="mdp" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>