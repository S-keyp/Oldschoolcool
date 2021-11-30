<?php
$titre='bgquizz';
session_start();
    echo "<form method='post'>
    <input type='submit' name='button1'
            value='Nouvelle question'/>
    
    <input type='submit' name='button2'
            value='Button2'/>
</form>";

    
    require ('projet-php/config.php');
    if(isset($_SESSION['ids'])){
        $ids=$_SESSION['ids'];
    } else {
        $ids = [];
    }
    $id=2;
    if(isset($_POST['button1'])) {
        $max=4;
        if (count($ids) < $max) {
            $id = rand(1, $max);
            while(in_array($id, $ids) ) {
                $id = rand(1, 4);
            }
            $ids[]=$id;    
            echo "la valeur n'existe pas et à été ajouté";
        }
        print_r($ids);   
        $_SESSION['ids'] = $ids;
    }

    if(isset($_POST['button2'])) {
        $_SESSION['ids']=[];
    }
    
    
    
    $reqs = $dbh -> prepare("SELECT * FROM bgquizz WHERE id= $id");
    $reqs -> execute();

    foreach($reqs as $question) {
        echo "<h3>$question[question]</h3> 
        $question[a]
        $question[b]
        $question[c]
        $question[d]";
    }

    
?>