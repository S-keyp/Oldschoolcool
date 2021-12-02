<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-show="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <?php
                require('config.php');


                if(!isset($_SESSION['id'])){
                    header('Location: ../index2.php');
                    exit;
                }

                // On récupère les informations de l'utilisateur connecté
                $req = $dbh->prepare("SELECT * FROM utilisateurs WHERE id_utilisateurs = :id_utilisateurs");
                $req->execute(['id_utilisateurs' => $_SESSION['id']]);
                $afficher_profil = $req->fetch();


                if (isset($_POST['modification'])){
                    extract($_POST);
                    $valid = true;

                    $nom = htmlentities(trim($nom));
                    $prenom = htmlentities(trim($prenom));
                    $pseudo= htmlentities(trim($pseudo));
                    $email = htmlentities(strtolower(trim($email)));

                    if(empty($nom)){
                        $valid = false;
                        $_SESSION['error'] = "Il faut mettre un nom";
                    }

                    if(empty($prenom)){
                        $valid = false;
                        $_SESSION['error'] = "Il faut mettre un prénom";
                    }
                    if(empty($pseudo)){
                        $valid = false;
                        $_SESSION['error'] = "Il faut mettre un pseudo";
                    }else{
                        $req = $dbh->prepare("SELECT id_utilisateurs FROM utilisateurs WHERE id_utilisateurs <> :id AND pseudo = :pseudo");
                        $req->execute(['id' => $_SESSION['id'], 'pseudo' => $pseudo]);
                        $row = $req->fetch();
                        if($row) {
                            $valid = false;
                            $_SESSION['error'] = "Ce pseudo existe déjà";
                        }
                    }

                    if(empty($email)){
                        $valid = false;
                        $_SESSION['error'] = "Il faut mettre un mail";

                    }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)){
                        $valid = false;
                        $_SESSION['error'] = "Le mail n'est pas valide";

                    }else{
                        $req = $dbh->prepare("SELECT id_utilisateurs FROM utilisateurs WHERE id_utilisateurs <> :id AND email = :email");
                        $req->execute(['id' => $_SESSION['id'], 'email' => $pseudo]);
                        $row = $req->fetch();
                        if($row) {
                            $valid = false;
                            $_SESSION['error'] = "Ce mail existe déjà";
                        }
                    }
                    if ($valid) {
                        $sql = "UPDATE utilisateurs SET Prénom = :prenom, nom = :nom, pseudo = :pseudo, email = :email WHERE id_utilisateurs = :id";
                        $req = $dbh->prepare($sql);
                        $req->execute(['prenom' => $prenom, 'nom' => $nom, 'pseudo' => $pseudo, 'email' => $email, 'id' => $_SESSION['id']]);
                        $_SESSION['nom'] = $nom;
                        header("location: coordonnee.php");
                    }
                    $utilisateur['nom'] = $nom;
                    $utilisateur['prenom'] = $prenom;
                    $utilisateur['email'] = $email;
                    $utilisateur['pseudo'] = $pseudo;
                }
                ?>
                <form method="post" action="">
                Votre nom<p><input type="text" placeholder="Votre nom" name="nom" value="<?=$utilisateur['nom']?>"></p>
                    <p><input type="text" placeholder="Votre prénom" name="prenom" value="<?=$utilisateur['prenom']?>"></p>
                    <p><input type="email" placeholder="Adresse mail" name="email" value="<?=$utilisateur['email']?>"></p>
                    <p><input type="pseudo" placeholder="Pseudo" name="pseudo" value="<?=$utilisateur['pseudo']?>"></p>
                    <p><button type="submit" name="modification">Modifier</button></p>
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
		</form>
      </div>
    </div>
  </div>
</div>
</div>