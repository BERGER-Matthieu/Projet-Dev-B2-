<?php
    require_once("../connect.php");
    session_start();

    $id = $_POST['playerId'];
    $score = $_POST['gameScore'];
    $kills = $_POST['gameKills'];
    $time = $_POST['gameTime'];

    $sql = "INSERT INTO games (playerId, points, time, kills) VALUES ('$id', '$score', '$time', '$kills')";
    $conn->query($sql);

    header("Location: http://localhost/Projet-Dev-B2-/pages/score-creation.php");
?>