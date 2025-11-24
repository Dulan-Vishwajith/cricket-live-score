<?php
include("../includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Previous Matches</title>
    <style>
        body{
            background:black;
            color:#00ff66;
            font-family:Arial, sans-serif;
            text-align:center;
            padding:20px;
        }
        .match-card{
            border:2px solid #00ff66;
            border-radius:10px;
            padding:15px;
            margin:15px auto;
            width:90%;
            max-width:500px;
        }
        .winner{
            color:gold;
            font-weight:bold;
            font-size:18px;
        }
        .btn{
            margin-top:20px;
            padding:10px 20px;
            border:none;
            background:#00ff66;
            color:black;
            font-size:16px;
            cursor:pointer;
        }
    </style>
</head>
<body>

<h1>🏏 Previous Matches</h1>

<?php
$result = $conn->query("SELECT * FROM matches WHERE status='ended' ORDER BY id DESC");

if($result->num_rows > 0){
    while($m = $result->fetch_assoc()){
        echo "
        <div class='match-card'>
            <h3>Match ID: {$m['id']}</h3>
            <p><strong>{$m['team1']}</strong> : {$m['score1']}/{$m['wickets1']}</p>
            <p><strong>{$m['team2']}</strong> : {$m['score2']}/{$m['wickets2']}</p>
            <p class='winner'>Winner : {$m['winner']}</p>
        </div>";
    }
} else {
    echo "<p>No previous matches available</p>";
}
?>

<a href="../"><button class="btn">⬅ Back to Live Score</button></a>

</body>
</html>
