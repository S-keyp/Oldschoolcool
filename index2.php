<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/f12c8faf79.js" crossorigin="anonymous"></script>

    <title>OldSchool Cool</title>
</head>
<body>
    <?php 
        session_start();
        if (! isset($_SESSION['id'])) {
            header('location: index.php');
        }
    ?>
    <header class="container-fluid">
        <div class="navbar navbar-expand-md row">
            <div class="navbar-brand col-12 col-md-6 text-center">
                <img src="assets/img/osc-logo-2.png" alt="Logo" id="logo">
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
                    <li class="navbar-item nav-link">
                    <a href="projet-php/coordonnee.php"><?=isset($_SESSION["nom"]) ? "Bienvenue " . $_SESSION["nom"] : ""; ?></a>
                    <i class="far fa-user-circle" style="height: 100px; width: 100px;"></i>
                    </li>
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

    <div class="container-fluid">
        <div class="row text-center cover">
            <div class=" col-6" id="container-left"></div>
            <div class=" col-6" id="container-right"></div>
            <button class="btn btn-cover" id="open">Let's go</button>
        </div>
    </div>

    <main>
        <div class="title-div">
            <h2 data-text="Burger-Quizz">
                Burger-Quizz
            </h2>
        </div>

        <div class="container-fluid row" id="main-canvas">
            <div class="container col-12 mx-auto">
                <?php require('Games/Bg-quizz/bg-quizz.php');?>
            </div>
        </div>

        <div class="results container-fluid row">
            <div class="col-12 col-md-6 text-end">
                <p>Score J1:<span id="results-J1"><?= isset($_SESSION['score-J1'])? $_SESSION['score-J1'] : 0 ?></span></p>
            </div>
            <div class="col-12 col-md-6">
                <p><span id="results-J2"><?=isset($_SESSION['score-J2'])? $_SESSION['score-J2'] : 0?></span> : Score J2</p>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>