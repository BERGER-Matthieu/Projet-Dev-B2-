<?php
    require_once("../connect.php");
    require_once("is-friend-error-check.php");
    session_start();


    $userId = $_SESSION['id'];
    $friendId = $_GET['id'];
    
    if(isFriend($userId, $friendId)[0]){
        $error = isFriend($userId, $friendId)[1];
        header("Location: /pages/profiles.php?error=".$error);
        exit();
    }

    $sql = "INSERT INTO friends (userId, friendId) VALUES ('$userId', '$friendId')";
    $conn->query($sql);

    $error = "friend has been added";
    header("Location: /pages/profiles.php?error=".$error);
?>