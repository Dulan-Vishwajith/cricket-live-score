<?php
include("../includes/db.php");

// Delete all records (reset)
$conn->query("DELETE FROM matches");
$conn->query("ALTER TABLE matches AUTO_INCREMENT = 1");

header("Location: index.php");
exit;
?>
