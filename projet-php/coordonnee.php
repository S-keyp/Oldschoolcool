<?php
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


    }
?>