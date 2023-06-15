<?php
    function checkRegisterPasswords($password, $confirmPassword){
        if($password == "") {
            return [FALSE, "please enter a password"];
        }
        if($password != $confirmPassword) {
            return [FALSE, "Check if both password are the same"];
        }

        return [TRUE, "No errors"];
    }
?>