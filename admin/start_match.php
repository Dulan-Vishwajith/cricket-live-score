/*
<?php
include("../includes/db.php");

// If id given, start that match; else start first not started
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
} else {
    $res = $conn->query("SELECT id FROM matches WHERE status='not started' ORDER BY id ASC LIMIT 1");
    if(!$res || $res->num_rows == 0){
        header("Location: index.php");
        exit;
    }
    $row = $res->fetch_assoc();
    $id = $row['id'];
}

// Make sure no other match is 'started'
$conn->query("UPDATE matches SET status='not started' WHERE status='started'");

// Reset & start this match
$conn->query("
    UPDATE matches
    SET score1=0, score2=0,
        wickets1=0, wickets2=0,
        balls1=0, balls2=0,
        status='started',
        current_innings=1,
        current_batting_team=1,
        target=0,
        winner='not yet'
    WHERE id=$id
");

header("Location: index.php");
exit;
?>
*/
<?php
include("../includes/db.php");

/* Start the LAST selected but not started match */
$res = $conn->query("SELECT id FROM matches WHERE status='not started' ORDER BY id DESC LIMIT 1");

if(!$res || $res->num_rows == 0){
    header("Location: index.php");
    exit;
}

$row = $res->fetch_assoc();
$id = $row['id'];

$conn->query("
    UPDATE matches
    SET score1=0, score2=0,
        wickets1=0, wickets2=0,
        balls1=0, balls2=0,
        target=0,
        winner='not yet',
        current_innings=1,
        current_batting_team=1,
        status='started'
    WHERE id=$id
");

header("Location: index.php");
exit;
?>

