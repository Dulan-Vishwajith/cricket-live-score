<?php
include("../includes/db.php");
include("../includes/functions.php");

// Try to get current started match
$result = $conn->query("SELECT * FROM matches WHERE status='started' ORDER BY id DESC LIMIT 1");

if($result && $result->num_rows > 0){
    $match = $result->fetch_assoc();
} else {
    // Fallback: just get last match
    $result = $conn->query("SELECT * FROM matches ORDER BY id DESC LIMIT 1");
    $match = $result ? $result->fetch_assoc() : null;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>KPL-Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="panel">

<h2>🏏 KPL - ADMIN CONTROL PANEL</h2>

<div class="buttons">
    <button onclick="scheduleMatch()">Schedule Match</button>
    <button onclick="startMatch()">Start Match</button>
    <button onclick="swapMatch()">Swap / Target</button>
    <button onclick="endMatch()" class="danger">End Match</button>

    <a href="matches.php"><button>📋 View All Matches</button></a>

    <button onclick="clearDatabase()" class="danger">Clear Database</button>
</div>

<hr>

<h2>📊 Current Match</h2>

<?php if($match){ ?>

    <p><strong>Match ID:</strong> <?= $match['id'] ?></p>
    <p><strong>Status:</strong> <?= $match['status'] ?></p>
    <p><strong>Innings:</strong> <?= $match['current_innings'] ?></p>
    <p><strong>Batting:</strong>
        <?= ($match['current_batting_team'] == 1) ? $match['team1'] : $match['team2']; ?>
    </p>

    <div class="buttons">

        <div class="panel">
            <h3><?= $match['team1'] ?></h3>
            <p>Score: <?= $match['score1'] ?>/<?= $match['wickets1'] ?></p>
            <p>Overs: <?= oversCalculator($match['balls1']); ?></p>
        </div>
        
        
		<div class="center-horizontal">
   			<button onclick="swapMatch()">Swap / Target</button>
		</div>


        <div class="panel">
            <h3><?= $match['team2'] ?></h3>
            <p>Score: <?= $match['score2'] ?>/<?= $match['wickets2'] ?></p>
            <p>Overs: <?= oversCalculator($match['balls2']); ?></p>
        </div>

    </div>

    <?php if($match['target'] > 0){ ?>
        <h3>🎯 Target: <?= $match['target'] ?></h3>
    <?php } ?>

    <h3>🏆 Winner: <?= $match['winner']; ?></h3>

<?php } else { ?>

    <p>No matches in database.</p>

<?php } ?>

<h3>⚡ Score Controls</h3>
<div class="buttons">
    <button onclick="addRun(1)">+1</button>
    <button onclick="addRun(2)">+2</button>
    <button onclick="addRun(3)">+3</button>
    <button onclick="addRun(4)">+4</button>
    <button onclick="addRun(6)">+6</button>
    <button onclick="addWicket()">Wicket</button>
    <button onclick="extra('wide')">Wide</button>
    <button onclick="extra('bye')">Bye</button>
    <button onclick="extra('noball')">No Ball</button>
    <button onclick="addBall()">+Ball (Dot)</button>
</div>

</div>

<script src="../assets/js/admin.js"></script>
    <footer class="site-footer">
    <p>🏏 KPL Cricket Scoring System</p>
    <p>Developed by <strong>SE/2023</strong></p>
    <p>&copy; <?= date('Y'); ?> All Rights Reserved</p>
</footer>

</body>
</html>
