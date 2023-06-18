<?php
    require_once("connect.php");

    $nameOrEmail = $_POST['loginNameOrEmail'];
    $password = md5($_POST['loginPassword']);

    $sql = "SELECT * FROM profile WHERE ( email = '$nameOrEmail' OR name = '$nameOrEmail' ) AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['logedIn'] = TRUE;
        $_SESSION['id'] = $row['id'];
        header("Location: http://localhost/Projet-Dev-B2-/pages/home.php");
    } else {
        $error = "No such accounts";
        header("Location: http://localhost/Projet-Dev-B2-/pages/login-register.php?error=".$error);
    }
?>