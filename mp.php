<?php
/*
   Class Morpion
*/

class Morpion 
{
    private $game;
    private $player;
    private $player_count;


    // Initialise la partie (grille vide, joueur 1)
    public function init()
    {
        $this->game = [];
        for ($r=1 ; $r<=3; $r++) {
            for ($c=1 ; $c<=3; $c++) {
                $this->game[$c][$r] = '';
            }
        }
        $this->player = 1; 
        $this->computer = 0;
        $this->started = false;
    }


    // Charge la partie
    public function load()
    {
        if (! isset($_SESSION['game'])) {
            $this->init();
        } else {
            $this->game = $_SESSION['game'];
            $this->player = $_SESSION['player'];
            $this->computer = $_SESSION['computer'];
            $this->started = $_SESSION['started'];
        }
    }


    // Sauvegarde la partie
    public function save()
    {
        $_SESSION['game'] = $this->game;
        $_SESSION['player'] = $this->player;
        $_SESSION['computer'] = $this->computer;
        $_SESSION['started'] = $this->started;
    }


    // Démarre la partie
    public function start($playerCount)
    {
        if ($playerCount == 1) {
            $this->computer = rand(1, 2);
        }
        $this->started = true;
        $this->save();
    }


    // La partie est commencée ?
    public function isStarted()
    {
        return $this->started;
    }


    // Retourne le numéro du joueur joué par l'ordinateur
    public function getComputerPlayer()
    {
        return $this->computer;
    }


    // Fixe le numéro du joueur joué par l'ordinateur
    public function setComputerPlayer($val)
    {
        $this->computer = $val;
        $this->save();
    }



    // Un joueur joue une case
    public function play($col, $row)
    {
        $this->game[$col][$row] = $this->player;
    }


    // Permutation de joueur
    public function switchPlayer()
    {
        if ($this->player == 1) {
            $this->player = 2;
        } else {
            $this->player = 1;
        }
    }


    // Recherche de gagnant
    public function checkWinner()
    {
        // Test sur les lignes 
        if (($this->game[1][1] != '') && ($this->game[1][1] == $this->game[2][1]) && ($this->game[1][1] == $this->game[3][1])) {
                return $this->game[1][1];
        }
        if (($this->game[1][2] != '') && ($this->game[1][2] == $this->game[2][2]) && ($this->game[1][2] == $this->game[3][2])) {
            return $this->game[1][2];
        }
        if (($this->game[1][3] != '') && ($this->game[1][3] == $this->game[2][3]) && ($this->game[1][3] == $this->game[3][3])) {
            return $this->game[1][3];
        }

        // Test sur les colonnes 
        if (($this->game[1][1] != '') && ($this->game[1][1] == $this->game[1][2]) && ($this->game[1][1] == $this->game[1][3])) {
            return $this->game[1][1];
        }
        if (($this->game[2][1] != '') && ($this->game[2][1] == $this->game[2][2]) && ($this->game[2][1] == $this->game[2][3])) {
            return $this->game[2][1];
        }
        if (($this->game[3][1] != '') && ($this->game[3][1] == $this->game[3][2]) && ($this->game[3][1] == $this->game[3][3])) {
            return $this->game[3][1];
        }

        // Test sur les diagonales 
        if (($this->game[1][1] != '') && ($this->game[1][1] == $this->game[2][2]) && ($this->game[1][1] == $this->game[3][3])) {
            return $this->game[1][1];
        }
        if (($this->game[3][1] != '') && ($this->game[3][1] == $this->game[2][2]) && ($this->game[3][1] == $this->game[1][3])) {
            return $this->game[3][1];
        }

        return false;
    }


    // Recherche de match nul
    public function checkDraw()
    {
        for ($r=1 ; $r<=3; $r++) {
            for ($c=1 ; $c<=3; $c++) {
                if ($this->game[$c][$r] == '') {
                    return false;
                };
            }
        }
        return true;
    }
    

    // Recherche la 1ere case remplie pour le joueur
    public function getFirstCell($player)
    {
        for ($r=1 ; $r<=3; $r++) {
            for ($c=1 ; $c<=3; $c++) {
                if ($this->game[$c][$r] == $player) {
                    return $c.$r;
                };
            }
        }
        return false;
    }


    // Recherche une case libre
    public function getFreeCell()
    {
        if ($this->game[2][2] == '') {
            return '22';
        }
        for ($r=1 ; $r<=3; $r++) {
            for ($c=1 ; $c<=3; $c++) {
                if ($this->game[$c][$r] == '') {
                    return $c.$r;
                };
            }
        }
        return false;
    }


    // Recherche d'une case permettant de compléter une ligne
    public function getCellToComplete($player)
    {
        // Recherche une colonne permettant de gagner
        for ($c=1; $c<=3; $c++) {
            if ($this->game[$c][1] == $player && $this->game[$c][2] == $player && $this->game[$c][3] == '') {
                return $c.'3';
            }
            if ($this->game[$c][1] == $player && $this->game[$c][2] == '' && $this->game[$c][3] == $player) {
                return $c.'2';
            }
            if ($this->game[$c][1] == '' && $this->game[$c][2] == $player && $this->game[$c][3] == $player) {
                return $c.'1';
            }
        }

        // Recherche une ligne permettant de gagner
        for ($r=1; $r<=3; $r++) {
            if ($this->game[1][$r] == $player && $this->game[2][$r] == $player && $this->game[3][$r] == '') {
                return '3'.$r;
            }
            if ($this->game[1][$r] == $player && $this->game[2][$r] == '' && $this->game[3][$r] == $player) {
                return '2'.$r;
            }
            if ($this->game[1][$r] == '' && $this->game[2][$r] == $player && $this->game[3][$r] == $player) {
                return '1'.$r;
            }
        }

        // Recherche une diagonale permettant de gagner
        if ($this->game[1][1] == $player && $this->game[2][2] == $player && $this->game[2][2] == '') {
            return '33';
        }
        if ($this->game[3][1] == $player && $this->game[2][2] == $player && $this->game[1][3] == '') {
            return '13';
        }

        if ($this->game[1][1] == '' && $this->game[2][2] == $player && $this->game[3][3] == $player) {
            return '11';
        }
        if ($this->game[3][1] == '' && $this->game[2][2] == $player && $this->game[1][3] == $player) {
            return '31';
        }

        if ($this->game[1][1] == $player && $this->game[2][2] == '' && $this->game[3][3] == $player) {
            return '22';
        }
        if ($this->game[3][1] == $player && $this->game[2][2] == '' && $this->game[1][3] == $player) {
            return '22';
        }

        return null;
    }


    // Recherche une case libre adjacente à une case du joueur
    public function getNextCell($coord)
    {
        $col = $coord[0];
        $row = $coord[1];

        for ($c=$col-1; $c<=$col+1; $c++) {
            for ($r=$row-1; $r<=$row+1; $r++) {
                if (isset($this->game[$c][$r]) && $this->game[$c][$r] == '') {
                    return $c.$r;
                }
            }
        }
        return false;
    }
    
    
    // L'odinateur joue si nécessaire
    public function computerPlay()
    {
        if ($this->checkWinner() == false && $this->checkDraw() == false && $this->getComputerPlayer() == $this->player) {
            // Recherche d'un coup gagnant
            $play = $this->getCellToComplete($this->player);
            if (! $play) {
                // On cherche a bloquer l'autre utilisateur
                $other_player = ($this->player == 1 ? 2 : 1);
                $play = $this->getCellToComplete($other_player);
                if (! $play) {
                    // Est-ce que le joueur a déjà une case ?
                    $coord = $this->getFirstCell($this->player);
                    if ($coord !== false) {
                        // Dans ce cas on cherche une cellule adjacente
                        $play = $this->getNextCell($coord);
                    }
                }
            }
            if (! $play) {
                // On cherche la 1ere cellule vide
                $play = $this->getFreeCell($coord);
            }

            $this->play($play[0], $play[1]);
            $this->switchPlayer();
        }
        $this->save();
    }




    // Affiche le formulaire de choix de mode de jeu
    public function displayPlayMode()
    {
        $html = '';
        if ($this->isStarted() == false) {
            $html .= '<form action="" method="POST">';
            $html .= '<input type="radio" name="mode" value="1" />1 joueur <br/>';
            $html .= '<input type="radio" name="mode" value="2" />2 joueurs <br/>';
            $html .= '<br/>';
            $html .= '<input type="submit" name="setmode" value="commencer"/>';
            $html .= '</form>';
        }
        return $html;
    }


    // Affiche le message de fin de partie
    public function displayEnd() {
        // On teste si on a un gagnant
        $winner = $this->checkWinner();
        if ($winner !== false) {
            if ($this->getComputerPlayer() == 0) {
                return 'Joueur ' . $winner . ', vous avez gagné <br/>'; 
            } else {
                if ($this->getComputerPlayer() == $winner) {
                    return 'L\'ordinateur a gagné <br/>';
                } else {
                    return 'Vous avez gagné <br/>';
                }
            }

        // Est-ce qu'on a un match nul ?
        } elseif ($this->checkDraw()) {
            return 'Partie terminée. Pas de gagnant <br/>'; 
        }

        return false;
    }
    

    // Affiche quel joueur doit jouer
    public function displayPlayer() {
        if ($this->isStarted() == false) {
            return '';
        }

        if (! $this->checkWinner() && ! $this->checkDraw()) {  
            if ($this->getComputerPlayer() == 0) {
                return 'Joueur ' . $this->player . ', a vous de jouer <br/><br/>';
            } else {
                return 'A vous de jouer <br/><br/>';
            }
        } else {
            return '<br/>';
        }
    }


    // Affiche la grille
    public function displayGrid()
    {
        $html = '';
        if ($this->isStarted()) {
            $html .= '<table>';
            for ($r=1 ; $r<=3; $r++) {
                $html .= '<tr height="60px" >';
                for ($c=1 ; $c<=3; $c++) {
                    $html .= '<td width="55px" style="align:center; border-style:solid"';
                    if ($this->game[$c][$r] == '') {
                        $html .= ' onclick="clic(\'' . $c . $r . '\')"';
                    }
                    $html .= '>';
                    $html .= '<img src="';
                    if ($this->game[$c][$r] == 1) {
                        $html .= 'croix.jpg';
                    } elseif ($this->game[$c][$r] == 2) {
                        $html .= 'rond.jpg';
                    }
                    $html .= '">';
                    $html .= '</td>';
                }
                $html .= '</tr>';
            }
            $html .= '</table>';
        }
        return $html;
    }


    // Affiche le message pour réinitialiser la partie
    public function displayNewGame() {
        if ($this->isStarted()) {
            return '<a href="?reset">Nouvelle partie</a>';
        } else {
            return '';
        }
    }


}



?>