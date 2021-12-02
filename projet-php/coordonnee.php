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
    <header class="container-fluid">
        <div class="navbar navbar-expand-md row">
            <div class="navbar-brand col-12 col-md-6 text-center">
                <img src="../assets/img/osc-logo-2.png" alt="Logo" id="logo">
            </div>

            <button class="navbar-toggler ml-auto custom-toggler col-12" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#myNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
            </button>    

            <div class="navbar navbar-collapse collapse col-12 col-md-6" id="myNavbar">
                <ul class="navbar-nav ">
                    <li class="navbar-item nav-link">Bienvenue <?= $_SESSION["nom"] ?>!</li>
                    <li class="navbar-item nav-link">
                        <button class="btn btn-danger" 
                                data-bs-target="#Modal" 
                                data-bs-toggle="modal">
                            Se déconnecter
                            <li class="fas fa-sign-out-alt"></li>
                        </button>
                        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Déconnexion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p>Voulez-vous vraiment vous déconnecter?</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary"><a href="projet-php/logout.php">Confirmer</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>

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
        <?php $reqs = $dbh -> prepare("SELECT nom_j1, nom_j2, score_j1, score_j2 FROM historique Join utilisateurs ON historique.id_Utilisateur=utilisateurs.id_utilisateurs WHERE id_utilisateur = $id ");
        $reqs -> execute();
            echo "<div class='container-fluid row-results row'>";
            foreach($reqs as $question)
                echo "<div class='card text-center text-white bg-info mb-3' style='max-width: 18rem;'>
                    <div class='card-header'>Historique</div>
                    <div class='card-body'>
                        <h5 class='card-title'> $question[nom_j1] vs $question[nom_j2]</h5>
                        <p class='card-text'>Votre score est: $question[score_j1] VS $question[score_j2]</p>
                    </div>
                    </div>";
            echo "</div>";
        ?>
        
        <a href="../index2.php">Revenir à la page d'accueil</a>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
</html>