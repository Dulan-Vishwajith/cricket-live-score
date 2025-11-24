<?php
include("../includes/db.php");

if(isset($_POST['matches'])){

    $lines = explode("\n", $_POST['matches']);

    foreach($lines as $line){
        $line = trim($line);

        if(!empty($line)){
            list($team1, $team2) = array_map('trim', explode(",", $line));
            
            $conn->query("
                INSERT INTO matches (team1, team2, status)
                VALUES ('$team1', '$team2', 'not started')
            ");
        }
    }
}

header("Location: matches.php");
exit;
?>
