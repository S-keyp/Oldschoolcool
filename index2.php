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
    <?php session_start() ?>
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
                        <a href="/projet-php/"><?=isset($_SESSION["nom"]) ? "Bienvenue " . $_SESSION["nom"] : ""; ?> </a>
                    </li>
                    <li class="navbar-item nav-link">
                        
                    </li>
                    <!-- <li class="navbar-item nav-link">  DEVRAIT ËTRE AFFICHER SEULEMENT
                        <a href="#mesCreations">Mes créations</a> SI LE JOUEUR EST CO
                    </li> -->
                </ul>
            </div>
        </div>
    </header>


    <main>
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