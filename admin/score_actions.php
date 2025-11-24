<?php
include("../includes/db.php");

// Get current started match
$res = $conn->query("SELECT * FROM matches WHERE status='started' ORDER BY id DESC LIMIT 1");
$match = $res ? $res->fetch_assoc() : null;

if(!$match){
    header("Location: index.php");
    exit;
}

$id = $match['id'];
$bat = (int)$match['current_batting_team'];

if($bat == 1){
    $score   = (int)$match['score1'];
    $wickets = (int)$match['wickets1'];
    $balls   = (int)$match['balls1'];
} else {
    $score   = (int)$match['score2'];
    $wickets = (int)$match['wickets2'];
    $balls   = (int)$match['balls2'];
}

$run_add  = 0;
$ball_add = 0;

// Runs
if(isset($_GET['run'])){
    $run_add = (int)$_GET['run'];
    $ball_add = 1;
}

// Wicket
if(isset($_GET['wicket'])){
    $wickets++;
    $ball_add = 1;
}

// Dot ball
if(isset($_GET['ball'])){
    $ball_add = 1;
}

// Extras
if(isset($_GET['extra'])){
    $extra = $_GET['extra'];
    if($extra == 'wide' || $extra == 'noball'){
        $run_add += 1; // no ball count
    } elseif($extra == 'bye'){
        $run_add += 1;
        $ball_add += 1;
    }
}

$score += $run_add;
$balls += $ball_add;

// Save
if($bat == 1){
    $conn->query("UPDATE matches SET score1=$score, wickets1=$wickets, balls1=$balls WHERE id=$id");
} else {
    $conn->query("UPDATE matches SET score2=$score, wickets2=$wickets, balls2=$balls WHERE id=$id");
}

header("Location: index.php");
exit;
?>
