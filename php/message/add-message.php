<?php
    require_once("../connect.php");
    session_start();

    $id = $_SESSION['id'];
    $friendId = $_GET['id'];
    $content = $_POST['messageContent'];
    $dateTime = date('y-m-d h:m:s');

    $sql = "INSERT INTO messages (senderId, receiverId, content, time) VALUES ('$id', '$friendId', '$content', '$dateTime')";
    $conn->query($sql);

    header("Location: http://localhost/Projet-Dev-B2-/pages/message.php?id=".$friendId);
?>