<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
				<?php
			require('config.php');
			session_start();

			if (isset($_POST['pseudo'], $_POST['mdp'])){

				$pseudo= $_POST['pseudo'];
				$mdp= $_POST['mdp'];
				$request = $dbh -> prepare("SELECT id_utilisateurs, nom, pseudo, mdp FROM utilisateurs WHERE pseudo= :pseudo and mdp= :mdp");
				if(!$request -> execute(['pseudo' => $pseudo,
									'mdp' => $mdp])){
						print '<h3 class="error">Nom d\'utilisateur ou Mot de passe invalide</h3>';
					} 
					else {
						$row= $request->fetch();
						$_SESSION['nom'] = $row['nom'];
						$_SESSION['id'] = $row['id_utilisateurs'];
						header('location:../index2.php');
					
					}
				


			}
			?>
				<form class="box" action="projet-php/login.php" method="post" name="login">
							<input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur"><br/>
							<input type="password" class="box-input" name="mdp" placeholder="Mot de passe">
							<p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>
					<?php if (! empty($message)) { ?>
						<p class="errorMessage"><?php echo $message; ?></p>
					<?php } ?>
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Connexion</button>
		</form>
      </div>
    </div>
  </div>
</div>