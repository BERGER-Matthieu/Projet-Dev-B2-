<?php
    session_start();
    session_destroy();
    
    $msg = "You've been successfully loged out";
    header("Location: http://localhost/Projet-Dev-B2-/pages/login-register.php?error=".$msg);
?>