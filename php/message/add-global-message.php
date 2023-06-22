<?php
    require_once("../connect.php");
    session_start();

    $id = $_SESSION['id'];
    $content = $_POST['messageContent'];
    $dateTime = date('y-m-d h:m:s');

    $sql = "INSERT INTO messages (senderId, content, time) VALUES ('$id', '$content', '$dateTime')";
    $conn->query($sql);

    header("Location: /pages/global-chat.php");
?>