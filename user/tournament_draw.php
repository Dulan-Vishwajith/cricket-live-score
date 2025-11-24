<?php
include("includes/db.php");

/*
Later you can connect this dynamically like:
SELECT winner FROM matches WHERE id=1
For now this is structure + placeholder
*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>🏆 KPL Tournament Tree</title>

    <style>
        body{
            background:#0f172a;
            color:white;
            font-family:Arial;
            padding:20px;
            overflow-x:auto;
        }

        h1{
            text-align:center;
            margin-bottom:30px;
        }

        .bracket{
            display:flex;
            justify-content:space-between;
            min-width:1600px;
        }

        .side{
            display:flex;
            flex-direction:column;
            gap:25px;
        }

        .section-title{
            font-weight:bold;
            font-size:18px;
            margin-bottom:10px;
            text-align:center;
            text-decoration:underline;
        }

        .team, .match, .final{
            border:1px solid #475569;
            padding:8px 10px;
            background:#1e293b;
            border-radius:6px;
            min-width:100px;
            text-align:center;
        }

        .match{
            background:#0f172a;
        }

        .round{
            display:flex;
            flex-direction:column;
            justify-content:space-around;
            gap:40px;
        }

        .final-round{
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .final{
            font-size:18px;
            background:#2563eb;
        }
    </style>
</head>
<body>

<h1>🏆 KPL TOURNAMENT TREE</h1>

<div class="bracket">

    <!-- ================= A SIDE ================= -->
    <div class="side">

        <div class="section-title">A Teams</div>

        <div class="round">
            <div class="team">TEAM 1</div>
            <div class="team">TEAM 2</div>
            <div class="team">TEAM 3</div>
            <div class="team">TEAM 4</div>
            <div class="team">TEAM 5</div>
            <div class="team">TEAM 6</div>
            <div class="team">TEAM 7</div>
            <div class="team">TEAM 8</div>
            <div class="team">TEAM 9</div>
            <div class="team">TEAM 10</div>
            <div class="team">TEAM 11</div>
            <div class="team">TEAM 12</div>
            <div class="team">TEAM 13</div>
        </div>

    </div>

    <!-- ================= MATCH COLUMN ================= -->
    <div class="round">

        <div class="match">Match #1</div>
        <div class="match">Match #3</div>      
        <div class="match">Match #5</div>
        <div class="match">Match #7</div>
        <div class="match">Match #9</div>
        <div class="match">Match #11</div>
        <div class="match">Match #13</div>
        <div class="match">Match #15</div>
        <div class="match">Match #17</div>
        <div class="match">Match #19</div>
        <div class="match">Match #21</div>

    </div>

    <!-- ================= FINAL COLUMN ================= -->
    <div class="final-round">
        <div class="final">Final Match #23</div>
    </div>

    <!-- ================= MATCH COLUMN ================= -->
    <div class="round">

        <div class="match">Match #2</div>
        <div class="match">Match #4</div>
        <div class="match">Match #6</div>
        <div class="match">Match #8</div>
        <div class="match">Match #10</div>
        <div class="match">Match #12</div>
        <div class="match">Match #14</div>
        <div class="match">Match #16</div>
        <div class="match">Match #18</div>
        <div class="match">Match #20</div>
        <div class="match">Match #22</div>

    </div>

    <!-- ================= B SIDE ================= -->
    <div class="side">

        <div class="section-title">B Teams</div>

        <div class="round">
            <div class="team">TEAM 1</div>
            <div class="team">TEAM 2</div>
            <div class="team">TEAM 3</div>
            <div class="team">TEAM 4</div>
            <div class="team">TEAM 5</div>
            <div class="team">TEAM 6</div>
            <div class="team">TEAM 7</div>
            <div class="team">TEAM 8</div>
            <div class="team">TEAM 9</div>
            <div class="team">TEAM 10</div>
            <div class="team">TEAM 11</div>
            <div class="team">TEAM 12</div>
            <div class="team">TEAM 13</div>
        </div>

    </div>

</div>

</body>
</html>
