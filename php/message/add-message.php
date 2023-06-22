<?php
    require_once("../connect.php");
    session_start();

    if(strlen($_POST['messageContent']) != 0){
        $id = $_SESSION['id'];
        $friendId = $_GET['id'];
        $content = $_POST['messageContent'];
        $dateTime = date('y-m-d H:i:s');
        
        $sql = "INSERT INTO messages (senderId, receiverId, content, time) VALUES ('$id', '$friendId', '$content', '$dateTime')";
        $conn->query($sql);
    }

    header("Location: /pages/chat.php?id=".$_GET['id']);
?>