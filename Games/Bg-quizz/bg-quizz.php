<?php
    $nb_questions=37; // Nombre de question disponibles en base
    $nb_round=5; // nombre de round par joueur

    require ('projet-php/config.php');

    // Remise à zéro du jeu
    if(isset($_POST['button2'])) {
        unset($_SESSION['game']);
        header('location:index2.php');
    }
    // Remise à zéro du jeu
    if(isset($_POST['button3'])) {
        unset($_SESSION['game']);
        unset($_SESSION['score-J2']);
        unset($_SESSION['score-J1']);
        header('location:index2.php');
    }

    if(isset($_SESSION['game'])){
        $game=$_SESSION['game'];
        $scoreJ2 = $_SESSION['score-J2'];
        $scoreJ1 = $_SESSION['score-J1'];
    } else {
        // On initialise la partie
        $game = ['player' => 1, 'round' => 0, 'score' => ['1' => 0, '2' => 0] ];
        $scoreJ1 = (isset($_SESSION['score-J1']) ? $_SESSION['score-J1'] : 0);
        $scoreJ2 = (isset($_SESSION['score-J2']) ? $_SESSION['score-J2'] : 0);
        
        // On initialise les 4 questions des 2 joueurs
        for( $i = 1; $i <=2; $i++ ) {
            $ids = [];
            while (count($ids) < $nb_round) {
                $id = rand(1, $nb_questions);
                while(in_array($id, $ids)) {
                    $id = rand(1, $nb_questions);
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
        $rep = $_POST['rep_utilisateur'] ?? "";
        $rep_bdd = $_POST['rep_bdd'];
        if($rep == $rep_bdd){
            $game['score'][$player] ++ ;
            echo "<p style='color:green'>Bonne réponse!</p>";
        } else {
            echo "<p style='color:red'>Mauvaise réponse!</p>";
        }
    }  

    // On répond à la question
    if(isset($_POST['button1'])) {
        if ($round < ($nb_round - 1)) {
            $endgame= 0;
            $game['round'] ++ ;     // On passe au tour suivant
            header('location:#');
        } else {
            if ($player == 1) {
                $game['player'] = 2;     // On passe au joueur 2
                $game['round'] = 0 ;     // round 0 du joueur 2
                header('location:#');
            } else {
                $scoreJ2 = $_SESSION['score-J2'];
                $scoreJ2 = (is_null($scoreJ2) ? 0 : $scoreJ2);
                $scoreJ1 = $_SESSION['score-J1'];
                $scoreJ1 = (is_null($scoreJ1) ? 0 : $scoreJ1);
                if ($game['score'][1] == $game['score'][2] ) {
                    echo 'match nul';
                    echo "<form method='post'>
                            <input type='submit' name='button2'value='Nouvelle partie?'/>
                        </form>";
                } elseif($game['score'][1] > $game['score'][2] ) {
                    $scoreJ1++;
                    if($scoreJ1 <3){
                        echo '<br>Le joueur 1 a gagné';
                        echo "<form method='post'>
                            <input type='submit' name='button2'value='Nouvelle partie?'/>
                        </form>";
                    } else { 
                        echo "<h3>Partie terminée, le joueur 1 l'emporte</h3>";
                        $id=$_SESSION['id'];
                        $reqs = $dbh -> prepare("INSERT INTO historique (nom_j1, nom_j2, score_j1, score_j2, id_Utilisateur) VALUES (:nom_j1, :nom_j2, :score_j1, :score_j2, :id)");
                        $reqs -> execute(['nom_j1'=>$_SESSION['pseudo'], 'nom_j2'=>'J2', 'score_j1'=>$scoreJ1, 'score_j2'=>$scoreJ2, 'id' => $id]);
                        unset($_SESSION['score_J1'], $_SESSION['score_J2']);
                        echo "<form method='post'>
                            <input type='submit' name='button3'value='Nouvelle partie?'/>
                        </form>";
                    }
                } else {
                    $scoreJ2++;
                    if($scoreJ2 <3){
                        echo '<br>Le joueur 2 a gagné';
                        echo "<form method='post'>
                            <input type='submit' name='button2'value='Nouvelle partie?'/>
                        </form>";
                    } else {
                        $id=$_SESSION['id'];
                        echo "<h3>Partie terminée, le joueur 2 l'emporte</h3>";
                        $reqs = $dbh -> prepare("INSERT INTO historique (nom_j1, nom_j2, score_j1, score_j2, id_Utilisateur) VALUES (:nom_j1, :nom_j2, :score_j1, :score_j2, :id)");
                        $reqs -> execute(['nom_j1'=>$_SESSION['pseudo'], 'nom_j2'=>'J2', 'score_j1'=>$scoreJ1, 'score_j2'=>$scoreJ2, 'id' => $id]);
                        unset($_SESSION['score_J1'], $_SESSION['score_J2']);
                        echo "<form method='post'>
                            <input type='submit' name='button3'value='Nouvelle partie?'/>
                        </form>";
                    }
                    
                }
                // Fin de partie
            }
        }
    }
    
    echo "<form method='post'>
            <input type='submit' name='button1' value='Nouvelle question'/>
            <input type='submit' name='button2' value='Recommencer la partie'/>
        </form>";

    echo 'Joueur : ' . $player . ' - Round : ' . $round . ' - Score : ' . $game['score'][$player];
    
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
                <input type='hidden' name='rep_bdd' value='$question[rep]'>";

        if($valider == 0){
            echo "<input type='submit' name='confirmation'value='Confirmer votre réponse?'>";
        }
        echo "</div>
        </form>";      
    }

    

    // Sauvegarde de l'état du jeu
    $_SESSION['game'] = $game;
    $_SESSION['score-J2'] = $scoreJ2;
    $_SESSION['score-J1'] = $scoreJ1;
    
?>


