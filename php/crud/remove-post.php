<?php
    require_once("../connect.php");
    session_start();


    $id = $_SESSION['id'];
    $postId = $_GET['id'];

    $sql = "SELECT * FROM profile WHERE id = $id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $isAdmin = $row['isAdmin'];
    
    if($isAdmin){
        $sql = "DELETE FROM post WHERE postId = $postId";
        $conn->query($sql);
    }

    header("Location: http://localhost/Projet-Dev-B2-/pages/forum.php");
?>