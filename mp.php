<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bg-quizz</title>
</head>
<body>
    <p>qsmdlfjkqsdmlfj</p>
    <?php
        require ('projet-php/config.php');
        $id = rand(1, 2);
        $reqs = $dbh -> prepare('SELECT * FROM bg_quizz WHERE id= $id');
        $reqs -> execute();

        foreach($reqs as $question) {
            echo "<h3>$question[question]</h3> 
            $question[a]
            $question[b]
            $question[c]
            $question[d]";
        }
    ?>
</body>
</html>