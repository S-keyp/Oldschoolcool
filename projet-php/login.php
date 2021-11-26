<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
				<?php
			require('config.php');
			session_start();

			if (isset($_POST['pseudo'], $_POST['mdp'])){

				$pseudo= $_POST['pseudo'];
				$mdp= $_POST['mdp'];
				$request = $dbh -> prepare("SELECT pseudo, mdp FROM utilisateurs WHERE pseudo= :pseudo and mdp= :mdp");
				if(!$request -> execute(['pseudo' => $pseudo,
									'mdp' => $mdp])){
						print '<h2 class="error">Nom d\'utilisateur ou Mot de passe invalide</h2>';
					} 
					else {
						header('location:index.html');
					}
				


			}
			?>
				<form class="box" action="projet-php/login.php" method="post" name="login">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>