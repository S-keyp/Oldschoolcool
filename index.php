<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>OldSchool Cool</title>
</head>
<body>
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
                        <a href="inscription.html">Créer un compte</a>
                    </li>
                    <li class="navbar-item nav-link">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary" 
                                        data-bs-target="#Modal" 
                                        data-bs-toggle="modal">
                                    Se connecter
                                </button>
                                <div class="modal fade" id="Modal"
                                    tabindex="-1" aria-labelledby="ModalLabel"
                                    data-bs-backdrop="false"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Connection</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                
                                                    <p>Identifiant:    <input type="text" name="email" id=""> </p>
                                                    <p>Mot de passe:    <input type="password" name="password" id=""></p>
                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                                    <button class="btn btn-primary"><a href="inscription.html">Créer un compte</a></button>
                                                    <input class="btn btn-info" type="submit" value="Se connecter"><!-- plus besoin? <button class="btn btn-info"></button> -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- <li class="navbar-item nav-link">  DEVRAIT ËTRE AFFICHER SEULEMENT
                        <a href="#mesCreations">Mes créations</a> SI LE JOUEUR EST CO
                    </li> -->
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
            Launch demo modal
        </button>
        <?php require "projet-php/login.php"; ?>
        <div class="title-div">
            <h2 data-text="DYNAMICTITLE">
                DYNAMICTITLE
            </h2>
        </div>

        <canvas>

        </canvas>

        <div class="results container-fluid row">
            <div class="col-12 col-md-6 text-end">
                <p>Pseudo J1 : <input type="text" name="pseudo-J1">Score J1:<span id="results-J1">03</span></p>
            </div>
            <div class="col-12 col-md-6">
                <p><span id="results-J2">01</span> : Score J2<input type="text" name="pseudo-J2"> :Pseudo J2</p>
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