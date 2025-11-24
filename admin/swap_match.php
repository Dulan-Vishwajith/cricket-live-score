/*
<?php
include("../includes/db.php");

$res = $conn->query("SELECT * FROM matches ORDER BY id DESC LIMIT 1");
$match = $res ? $res->fetch_assoc() : null;

if(!$match){
    header("Location: index.php");
    exit;
}

$id = $match['id'];
$status = $match['status'];
$current_innings = (int)$match['current_innings'];
$current_batting = (int)$match['current_batting_team'];

if($status == 'not started'){
    // Just swap team names
    $t1 = $match['team1'];
    $t2 = $match['team2'];
    $conn->query("UPDATE matches SET team1='$t2', team2='$t1' WHERE id=$id");
} elseif($status == 'started' && $current_innings == 1){
    // First innings finished, start second
    if($current_batting == 1){
        $target = $match['score1'] + 1;
        $next_batting = 2;
    } else {
        $target = $match['score2'] + 1;
        $next_batting = 1;
    }

    $conn->query("
        UPDATE matches
        SET target=$target,
            current_innings=2,
            current_batting_team=$next_batting
        WHERE id=$id
    ");
}

header("Location: index.php");
exit;
?>
*/
<?php
include("../includes/db.php");

/* Always get the CURRENT match 
   Priority: started match > last not started match */
$res = $conn->query("SELECT * FROM matches 
                     WHERE status='started' 
                     ORDER BY id DESC LIMIT 1");

if(!$res || $res->num_rows == 0){
    // If no started match, take the latest scheduled one
    $res = $conn->query("SELECT * FROM matches 
                         WHERE status='not started' 
                         ORDER BY id DESC LIMIT 1");
}

if(!$res || $res->num_rows == 0){
    die("No match found to swap.");
}

$match = $res->fetch_assoc();

$id = $match['id'];
$status = $match['status'];
$current_innings = (int)$match['current_innings'];
$current_batting = (int)$match['current_batting_team'];

/* ==============================
   CASE 1: MATCH NOT STARTED
   -> Only swap teams (for toss)
   ============================== */
if($status == 'not started'){

    $team1 = $match['team1'];
    $team2 = $match['team2'];

    $conn->query("
        UPDATE matches 
        SET team1 = '$team2',
            team2 = '$team1'
        WHERE id = $id
    ");

}

/* ==============================
   CASE 2: MATCH STARTED + 1ST INNINGS
   -> Set Target and Swap Batting Team
   ============================== */
else if($status == 'started' && $current_innings == 1){

    if($current_batting == 1){
        $target = $match['score1'] + 1;
        $next_batting = 2;
    } else {
        $target = $match['score2'] + 1;
        $next_batting = 1;
    }

    $conn->query("
        UPDATE matches
        SET 
            target = $target,
            current_innings = 2,
            current_batting_team = $next_batting
        WHERE id = $id
    ");
}

/* If already 2nd innings -> Do nothing */

header("Location: index.php");
exit;
?>

