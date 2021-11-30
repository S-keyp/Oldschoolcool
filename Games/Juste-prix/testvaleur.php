<html>
<meta charset = "utf-8">
    <?php
        $go = "hidden";
        $win = "hidden";
        $coup = $_POST["coup"] +1;
        $rep = $_POST["reponse"];
        $file = fopen("historique_chiffres.txt", "r") or die ("Impossible d'ouvrir le fichier !");
        $chiffre = fread($file,filesize("historique_chiffres.txt"));
        // echo (" Le chiffre mystère: $chiffre <br>");
        fclose ($file);

        $fileh = fopen("historique.txt", "a");
        $nbhis = $rep;
        fwrite($fileh,$nbhis."\n");
        fclose($fileh);
    ?>
    <h1 class="titre">Le Juste Prix !</h1>
        <form action="testvaleur.php" method="post">
            <article class="espace_rep">
                <p><input type="text" class="champ_rep" name="reponse" placeholder="Ta réposne !"></p>
                <input type="hidden" name="coup" value="<?php echo $coup; ?>">
                <button class="validate" type="submit" value="Plus" name="plus">   Valider !  </button>
            </article>
        <p class="champ_info"> 
            <?php 
                echo ("Ta réposne: $rep <br>");
            ?> 
        </p>
        <p class="champ_indiq">
            <?php
            if ($coup < 10) {
                if ($rep < $chiffre && $rep < 0) {
                    echo ("Tu dois entrer une valeur entre 0 et 100 seulement !");
                }
                else if ($rep < $chiffre) {
                    echo ("C'est plus !");
                }
                else if ($rep > $chiffre && $rep > 100) {
                    echo ("Tu dois entrer une valeur entre 0 et 100 seulement !");
                }
                else if ($rep > $chiffre) {
                    echo ("C'est moins !");
                }
                else if ($rep == $chiffre) { 
                    $go = "hidden";
                    $win = "visible";
                } 
            } else if ($coup == 10) {
                $win = "hidden";
                $go = "visible";
            }
                ?>
        </p>
        <p class="compteur">
            Coups:
                <?php
                    echo $coup ;
                ?>
        </p>

        <p class="historique">
            Votre historique:  <br> 
            <?php
                $fileh = fopen("historique.txt", "r");
                $fileh2 =  fread ($fileh, 255);
                fclose ($fileh);
                echo nl2br ($fileh2); 
            ?>
        </p>

        <div class="gagner" style="visibility: <?php echo $win ?>">
            <p class="paragag">Bravo tu as gagner !</p>
            <a class="reco" href="justeprix.php">Recommencer une partie !</a>
        </div>
        <div class="perdu"  style="visibility: <?php echo $go ?>">
            <p class="paraper">Dommage tu as perdu !</p>
            <a class="reco" href="justeprix.php">Recommencer une partie !</a>
        </div>
    </form>
     <style>
            * {
                background-color: black;
                display: hidden;
            }
            .titre {
                text-align: center;
                font-size: 5em;
                font-family: Arial;
                color: grey;
            }
            .espace_rep {
                margin: auto;
                width: 20%;
                height: 5em;
                text-align: center;
            }
            .champ_rep {
                border: none;
                background-color: purple;
                padding: 1em;
                margin: auto;
            }
            .validate {
                margin-top: 0;
                border: none;
                padding: 1em;
                background-color: green;
                border-radius: 10%;
            }
            .champ_info, .champ_indiq{
                width: 6em;
                height: auto;
                background-color: white;
                text-align: center;
            }
            .historique {
                width: 200px;
                color: white;
                font-family: Arial;
            }
            .perdu, .compteur {
                color: white;
            }
            .gagner {
                text-align: center;
                width: 30%;
                height: 20%;
                margin: auto;
                background-color: green;
            }
            .perdu {
                text-align: center;
                width: 30%;
                height: 20%;
                margin: auto;
                background-color: red;
            }
            .paragag {
                color: white;
                font-family: Arial;
                background-color: green;
            }
            .paraper {
                color: white;
                font-family: Arial;
                background-color: red;
            }
            .reco {
                font-family: Arial;
                margin-top: 0;
                border: none;
                padding: 1em;
                background-color: transparent;
                text-decoration: none;
                border: simple black 2px;
                border-radius: 30px;
                color: white;
            }
            .reco:hover {
                margin-top: 0;
                border: none;
                padding: 1em;
                background-color: transparent;
                text-decoration: none;
                border: simple black 2px;
                border-radius: 30px;
                color: grey;
            }
        </style>
</html>