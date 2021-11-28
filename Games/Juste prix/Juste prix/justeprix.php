<html>
<head>
<meta charset="UTF-8">
</head>
    <body>
        <?php
        $coup = 0;
        $file = fopen("historique_chiffres.txt", "w");
        $min = 0;
        $max = 100;
        $nb = rand($min, $max);
        fwrite($file, $nb);
        fclose($file);

        $fileh = fopen("historique.txt", "w");
        fwrite($fileh,"");
        fclose($fileh);
        ?>
        <h1 class="titre">Le Juste Prix !</h1>
            <form action="testvaleur.php" method="post">
                <article class="espace_rep">
                    <p><input type="text" class="champ_rep" name="reponse" placeholder="Ta réponse !">
                    <input type="hidden" name="coup" value="0">
                    <button class="validate" type="submit" value="Plus" name="plus">   Valider !  </button></p>
                </article>
                <p class="compteur"> Coups: <?php echo ("$coup"); ?> </p>
            </form>
        <style>
            * {
                background-color: black;
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
                margin-top: 1em;
                border: none;
                padding: 1em;
                background-color: green;
                border-radius: 10%;
            }
            .compteur {
                color: white;
            }
        </style>
    </body>
</html>