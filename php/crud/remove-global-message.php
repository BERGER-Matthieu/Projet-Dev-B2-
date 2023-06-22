<?php
    require_once("../connect.php");
    session_start();


    $id = $_SESSION['id'];
    $messageId = $_GET['id'];

    $sql = "SELECT * FROM profile WHERE id = $id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $isAdmin = $row['isAdmin'];
    
    if($isAdmin){
        $sql = "DELETE FROM messages WHERE messageId = $messageId";
        $conn->query($sql);
    }

    header("Location: /pages/global-chat.php");
?>