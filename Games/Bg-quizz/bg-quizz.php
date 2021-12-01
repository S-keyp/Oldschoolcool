<?php
$nb_questions=4; // Nombre de question disponibles en base
$nb_round=4; // nombre de round par joueur
$titre='bgquizz';
    echo "<form method='post'>
            <input type='submit' name='button1'
                    value='Nouvelle question'/>
            
            <input type='submit' name='button2'
                    value='Button2'/>
        </form>";

require ('projet-php/config.php');

    if(isset($_SESSION['game'])){
        $game=$_SESSION['game'];
    } else {
        // On initialise la partie
        $game = ['player' => 1, 'round' => 0, 'score' => ['1' => 0, '2' => 0] ];
        // On initialise les 4 questions des 2 joueurs
        for( $i = 1; $i <=2; $i++ ) {
            $ids = [];
            while (count($ids) < $nb_round) {
                $id = rand(1, $nb_questions);
                while(in_array($id, $ids) ) {
                    $id = rand(1, 4);
                }
                $ids[]=$id;
            }
            $game['questions'][$i] = $ids;
        }
    }

    $player = $game['player'];
    $round = $game['round'];
    $id = $game['questions'][$player][$round];

    /* CONFIRMATION */
    $valider=0;
    if(isset($_POST['confirmation'])){
        $valider= 1;
        $rep = $_POST['rep_utilisateur'];
        $rep_bdd = $_POST['rep_bdd'];
        if($rep == $rep_bdd){
            $game['score'][$player] ++ ;// caclculer vraiment le score
            echo "Bonne réponse";
        } else {
            echo "Mauvaise réponse";
        }
    }  

    
    echo 'joueur : ' . $player . ' - round : ' . $round .'<br>';
    echo 'question : ' . $id . ' - score : ' . $game['score'][$player];

    // On répond à la question
    if(isset($_POST['button1'])) {
        if ($round < ($nb_round - 1)) {
            $game['round'] ++ ;     // On passe au tour suivant
            header('location:#');
        } else {
            if ($player == 1) {
                $game['player'] = 2;     // On passe au joueur 2
                $game['round'] = 0 ;     // round 0 du joueur 2
                header('location:#');
            } else {
                if ($game['score'][1] == $game['score'][1] ) {
                    echo 'match nul';
                    exit;
                } elseif($game['score'][1] > $game['score'][1] ) {
                    echo 'Le joueur 1 a gagné';
                    exit;
                } else {
                    echo 'Le joueur 2 a gagné';
                    exit;
                }

                // Fin de partie
            }
        }

    }
    
    
    $reqs = $dbh -> prepare("SELECT * FROM bgquizz WHERE id= $id");
    $reqs -> execute();

    foreach($reqs as $question) {
        echo "<h3>$question[question]</h3>
        <form action='' method='POST'>
            <div class='container=fluid row'>
                <div class='rep-bg-quizz col-6'>
                    $question[a] <input type='radio' name='rep_utilisateur' value='a' id=''>
                </div>
                <div class='rep-bg-quizz col-6'>
                    <input type='radio' name='rep_utilisateur' value='b' id=''> $question[b] 
                </div>
                <div class='rep-bg-quizz col-6'>
                    $question[c] <input type='radio' name='rep_utilisateur' value='c' id=''>
                </div>
                <div class='rep-bg-quizz col-6'>
                    <input type='radio' name='rep_utilisateur' value='d' id=''> $question[d] 
                </div>
                <input type='text' name='rep_bdd' value='$question[rep]'>";

        if($valider == 0){
            echo "<input type='submit' name='confirmation'value='Confirmer votre réponse?'>";
        }
        echo "</div>
        </form>";
            
    }

    

    // Sauvegarde de l'état du jeu
    $_SESSION['game'] = $game;

    // Remise à zéro du jeu
    if(isset($_POST['button2'])) {
        unset($_SESSION['game']);
        header('location:#');
    }
?>


