<?php
    require_once "connect.php";
    require "register-error-check.php";

    $name = $_POST['registerName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword1'];
    $confirmPassword = $_POST['registerPassword2'];

    if(!checkRegisterPasswords($password ,$confirmPassword)[0]){
        $error = checkRegisterPasswords($password ,$confirmPassword)[1];
        header("Location: http://localhost/Projet-Dev-B2-/pages/login-register.php?error=".$error);
    }
    
    $password = md5($password);
    $sql = "INSERT INTO profile (name, email, password) VALUES ('$name', '$email', '$password')";
    $conn->query($sql);
?>