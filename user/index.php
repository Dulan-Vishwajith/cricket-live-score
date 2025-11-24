<?php
include("../includes/db.php");
include("../includes/functions.php");

// Live match
$res = $conn->query("SELECT * FROM matches WHERE status='started' ORDER BY id DESC LIMIT 1");
$match = $res ? $res->fetch_assoc() : null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>KPL-Live Score</title>
    <link rel="stylesheet" href="../assets/css/user.css">
    <meta http-equiv="refresh" content="5">
</head>
<body>

<h1>🏏KPL - Live Match</h1>

<?php if($match){ ?>

    <h2><?= $match['team1'] ?> vs <?= $match['team2'] ?></h2>
    <p><strong>Innings:</strong> <?= $match['current_innings'] ?></p>

    <?php if($match['target'] > 0){ ?>
        <h2>🎯 Target: <?= $match['target']; ?></h2>
    <?php } ?>

    <div class="scoreboard">

        <div class="team">
            <h3><?= $match['team1'] ?></h3>
            <p class="score"><?= $match['score1'] ?>/<?= $match['wickets1'] ?></p>
            <p class="overs">Overs: <?= oversCalculator($match['balls1']); ?></p>
        </div>

        <div class="team">
            <h3><?= $match['team2'] ?></h3>
            <p class="score"><?= $match['score2'] ?>/<?= $match['wickets2'] ?></p>
            <p class="overs">Overs: <?= oversCalculator($match['balls2']); ?></p>
        </div>

    </div>

    <div class="now-playing">
        <h3>🏟 Now Playing</h3>
        <p>🏏 Batting:
            <strong><?= ($match['current_batting_team'] == 1) ? $match['team1'] : $match['team2']; ?></strong>
        </p>
        <p>🎾 Bowling:
            <strong><?= ($match['current_batting_team'] == 1) ? $match['team2'] : $match['team1']; ?></strong>
        </p>
    </div>

<?php } else { ?>

    <h2>No match currently running</h2>

<?php } ?>

<h2>📋 Previous Matches</h2>

<table>
<tr>
    <th>Match ID</th>
    <th>Teams</th>
    <th>Score</th>
    <th>Winner</th>
</tr>

<?php
$ended = $conn->query("SELECT * FROM matches WHERE status='ended' ORDER BY id DESC");

if($ended && $ended->num_rows > 0){
    while($m = $ended->fetch_assoc()){
        echo "<tr>
                <td>{$m['id']}</td>
                <td>{$m['team1']} vs {$m['team2']}</td>
                <td>{$m['score1']} / {$m['score2']}</td>
                <td>{$m['winner']}</td>
              </tr>";
    }
}else{
    echo "<tr><td colspan='4'>No previous matches</td></tr>";
}
?>
</table>
    <footer class="site-footer">
    <p>🏏 KPL Cricket Scoring System</p>
    <p>Developed by <strong>SE/2023</strong></p>
    <p>&copy; <?= date('Y'); ?> All Rights Reserved</p>
</footer>


</body>
</html>
