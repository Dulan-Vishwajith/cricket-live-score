<?php
include("../includes/db.php");

// Scheduled (not started)
$scheduled = $conn->query("SELECT * FROM matches WHERE status='not started' ORDER BY id ASC");

// Finished
$ended = $conn->query("SELECT * FROM matches WHERE status='ended' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Matches</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <script src="../assets/js/admin.js"></script>

</head>
<body>
    <a href="index.php">
    <button style="margin-bottom:15px;">⬅ Back to Admin Panel</button>
</a>
    <button onclick="scheduleMatch()" style="margin-bottom:15px;">
    ➕ Schedule New Match
</button>



<div class="panel">
<h2>🗓️ Scheduled Matches</h2>

<table>
<tr>
    <th>ID</th>
    <th>Teams</th>
    <th>Action</th>
</tr>

<?php
if($scheduled && $scheduled->num_rows > 0){
    while($m = $scheduled->fetch_assoc()){
        echo "<tr>
            <td>{$m['id']}</td>
            <td>{$m['team1']} vs {$m['team2']}</td>
            <td><a href='start_match.php?id={$m['id']}'><button>Start This Match</button></a></td>
        </tr>";
    }
}else{
    echo "<tr><td colspan='3'>No scheduled matches</td></tr>";
}
?>
</table>

<h2>✅ Completed Matches</h2>

<table>
<tr>
    <th>ID</th>
    <th>Teams</th>
    <th>Winner</th>
</tr>
<?php
if($ended && $ended->num_rows > 0){
    while($m = $ended->fetch_assoc()){
        echo "<tr>
            <td>{$m['id']}</td>
            <td>{$m['team1']} vs {$m['team2']}</td>
            <td>{$m['winner']}</td>
        </tr>";
    }
}else{
    echo "<tr><td colspan='3'>No completed matches</td></tr>";
}
?>
</table>

</div>

</body>
</html>
