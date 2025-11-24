<?php
include("../includes/db.php");

$t1 = $_GET['team1'] ?? '';
$t2 = $_GET['team2'] ?? '';

if($t1 !== '' && $t2 !== ''){
    $t1 = $conn->real_escape_string($t1);
    $t2 = $conn->real_escape_string($t2);

    $conn->query("
        INSERT INTO matches (team1, team2, status, current_innings, current_batting_team, winner)
        VALUES ('$t1', '$t2', 'not started', 1, 1, 'not yet')
    ");
}

header("Location: matches.php");
exit;
?>
