<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
                        $sql = "SELECT id_utilisateurs, nom, Prénom, email, Date_abo FROM `utilisateurs` WHERE id_utilisateurs = $id;";

                            $query = $dbh->prepare($sql);
                            $query->execute();

         /*                    $result = $query->fetch();                        
                            $query = $dbh->prepare($sql);
                            $query->execute();
                         */
                        // On récupère les valeurs dans un tableau associatif
                            $nom = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach($nom as $nom){
                        ?>
                            <tr>
                                <td><?= $nom['nom'] ?></td>
                                <td><?= $nom['Prénom'] ?></td>
                                <td><?= $nom['email'] ?></td>
                                <td><?= $nom['Date_abo'] ?></td>
                                <button class="btn btn-primary" 
                                        data-bs-target="#Modal" 
                                        data-bs-toggle="modal">
                                    Modifier;
                                </button>
                                <?php require('modifier.php'); ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
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