<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/f12c8faf79.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>OldSchool Cool</title>   
</head>
<body>
    <?php
        require('config.php');
        session_start();
    ?>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1> <?=isset($_SESSION["nom"]) ? "Bienvenue " . $_SESSION["nom"] : ""; ?> </h1>
                <table class="table">
                    <thead>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Date D'inscription</th>
                    </thead>
                    <tbody>
                        <?php
                        $id= $_SESSION['id'];
                        $sql = "SELECT id_utilisateurs, nom, Prénom as prenom, pseudo, email, Date_abo FROM `utilisateurs` WHERE id_utilisateurs = $id;";

                            $query = $dbh->prepare($sql);
                            $query->execute();

         /*                    $result = $query->fetch();                        
                            $query = $dbh->prepare($sql);
                            $query->execute();
                         */
                        // On récupère les valeurs dans un tableau associatif
                        $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
                        ?>
                            <tr>
                                <td><?= $utilisateur['nom'] ?></td>
                                <td><?= $utilisateur['prenom'] ?></td>
                                <td><?= $utilisateur['email'] ?></td>
                                <td><?= $utilisateur['Date_abo'] ?></td>
                                <div>
                                <button class="btn btn-primary" 
                                        data-bs-target="#Modal" 
                                        data-bs-toggle="modal">
                                    Modifier
                                </button>
                                <?php require('modifier.php'); ?>
                            </tr>
                    </tbody>
                </table>
                <?php
                if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                ?>
            </section>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
</html>

<?php /*
    require('config.php');
    session_start();

    if (isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'],$_POST['email'],$_POST['date_abo'])){

        $nom= $_POST['nom'];
        $prenom= $_POST['prenom'];
        $pseudo= $_POST['pseudo'];
        $email= $_POST['email'];
        $date_abo= $_POST['date_abo'];

        $request = $dbh -> prepare("SELECT nom, prenom, pseudo, email, date_abo 
                                    FROM utilisateurs 
                                    WHERE nom = :nom 
                                    and prenom = :prenom 
                                    and pseudo = :pseudo 
                                    and email = :email 
                                    and date_abo= :date_abo");
				if(!$request -> execute(['nom' => $nom, 
                                        'prenom' => $prenom, 
                                        'pseudo' => $pseudo,
                                        'email' = $email,
									    'date_abo' => $date_abo])){
                                            

                                        }


    }*/
?>