<?php
    require_once("../connect.php");
    session_start();

    $id = $_SESSION['id'];
    $title = $_POST['postTitle'];
    $content = $_POST['postContent'];
    $dateTime = date('y-m-d h:m:s');

    $sql = "INSERT INTO post (creatorId, title, content, time) VALUES ('$id', '$title', '$content', '$dateTime')";
    $conn->query($sql);

    header("Location: http://localhost/Projet-Dev-B2-/pages/forum.php");
?>