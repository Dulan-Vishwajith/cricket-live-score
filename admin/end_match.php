<?php
include("../includes/db.php");

$res = $conn->query("SELECT * FROM matches WHERE status='started' ORDER BY id DESC LIMIT 1");
$match = $res ? $res->fetch_assoc() : null;

if(!$match){
    header("Location: index.php");
    exit;
}

$id = $match['id'];
$score1 = (int)$match['score1'];
$score2 = (int)$match['score2'];

if($score1 > $score2){
    $winner = $match['team1'];
} elseif($score2 > $score1){
    $winner = $match['team2'];
} else {
    $winner = "Draw";
}

$conn->query("UPDATE matches SET status='ended', winner='$winner' WHERE id=$id");

header("Location: matches.php");
exit;
?>
