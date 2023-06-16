<?php
    require_once "connect.php";

    function checkRegisterPasswords($password, $confirmPassword){
        if($password == "") {
            return [FALSE, "please enter a password"];
        }
        if($password != $confirmPassword) {
            return [FALSE, "Check if both password are the same"];
        }

        return [TRUE, "No errors"];
    }

    function checkRegisterEmail($email){
        global $conn;
        $sql = "SELECT * FROM profile WHERE email = '$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            return [FALSE, "This email is already used"];
        }

        return [TRUE, "No errors"];
    }
?>