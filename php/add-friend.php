<?php
    require_once("connect.php");
    require_once("add-friend-error-check.php");
    session_start();


    $userId = $_SESSION['id'];
    $friendId = $_GET['id'];
    
    if(!checkFriend($userId, $friendId)[0]){
        $error = checkFriend($userId, $friendId)[1];
        header("Location: http://localhost/Projet-Dev-B2-/pages/profiles.php?error=".$error);
        exit();
    }

    $sql = "INSERT INTO friends (userId, friendId) VALUES ('$userId', '$friendId')";
    $conn->query($sql);

    $error = "friend has been added";
    header("Location: http://localhost/Projet-Dev-B2-/pages/profiles.php?error=".$error);
?>