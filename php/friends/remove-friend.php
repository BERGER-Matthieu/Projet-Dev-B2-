<?php
    require_once("../connect.php");
    require_once("is-friend-error-check.php");
    session_start();


    $userId = $_SESSION['id'];
    $friendId = $_GET['id'];
    
    if(!isFriend($userId, $friendId)[0]){
        $error = isFriend($userId, $friendId)[1];
        header("Location: /pages/friend-list.php?error=".$error);
        exit();
    }

    $sql = "DELETE FROM friends WHERE userId = $userId and friendId = $friendId";
    $conn->query($sql);

    $error = "friend has been removed";
    header("Location: /pages/friends-list.php?error=".$error);
?>