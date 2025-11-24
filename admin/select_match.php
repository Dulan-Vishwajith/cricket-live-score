<?php
session_start();
include("../includes/db.php");

if(!isset($_GET['id'])){
    header("Location: matches.php");
    exit;
}

$id = (int)$_GET['id'];

// Do NOT allow ended matches
$check = $conn->query("SELECT status FROM matches WHERE id=$id");
$row = $check->fetch_assoc();

if($row['status'] == 'ended'){
    die("This match is already completed.");
}

$_SESSION['current_match_id'] = $id;

header("Location: index.php");
exit;
