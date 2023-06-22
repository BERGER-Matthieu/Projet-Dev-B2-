<?php
    require_once "../connect.php";
    require_once "register-error-check.php";

    $name = $_POST['registerName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword1'];
    $confirmPassword = $_POST['registerPassword2'];

    if(!checkRegisterPasswords($password ,$confirmPassword)[0]){
        $error = checkRegisterPasswords($password ,$confirmPassword)[1];
        header("Location: /pages/login-register.php?error=".$error);
        exit;
    }

    if(!checkRegisterEmail($email)[0]){
        $error = checkRegisterEmail($email)[1];
        header("Location: /pages/login-register.php?error=".$error);
        exit;
    }

    $password = md5($password);
    $sql = "INSERT INTO profile (name, email, password) VALUES ('$name', '$email', '$password')";
    $conn->query($sql);
    $msg = "You can now login with this account";
    header("Location: /pages/login-register.php?error=".$msg);
?>