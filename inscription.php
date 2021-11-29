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

    <title>Document</title>
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
                        <a href="inscription.php">Créer un compte</a>
                    </li>
                    <li class="navbar-item nav-link">
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-primary" 
                                        data-bs-target="#Modal" 
                                        data-bs-toggle="modal">
                                    Se connecter
                                </button>
                                <?php 
                                    require('projet-php/login.php');
                                ?>
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

    <main>

        <div class="form-card">
            <h3>Formulaire d'inscription</h3>
            <form action="projet-php/register.php" method="post" class="row">
                <div class="col-6 text-center">                    
                    <p>Nom :</p> 
                    <p>Prénom :</p> 
                    <p>Pseudo :</p> 
                    <p>Mail :</p> 
                    <p>Mot de passe :</p> 
                </div>
                <div class="col-6">                    
                    <p><input type="text" class="box-input" name="nom" placeholder="Nom" required /></p>
	                <p><input type="text" class="box-input" name="prenom" placeholder="Prénom" required /></p>
	                <p><input type="text" class="box-input" name="pseudo" placeholder="Pseudo" required /></p>
                    <p><input type="text" class="box-input" name="email" placeholder="Email" required /></p>
                    <p><input type="password" class="box-input" name="mdp" placeholder="Mot de passe" required /></p>
                </div>
                <!-- <p>Nom : <input type="text" name="nom"> Prénom : <input type="text" name="prenom"></p>
                <p>Pseudo : <input type="text" name="pseudo"></p>
                <p>Mail : <input type="text" name="email"></p>
                <p>Mot de passe : <input type="password" name="mdp"></p>
                <p>Confirmer le mot de passe : <input type="password" name="mdp"></p> -->
                <div class="col-12 text-end">
                    <a class="btn btn-primary" href="index.php">Revenir au menu</a>
                    <input class="btn btn-info" type="submit" value="S'inscrire">
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>