<?php
    session_start();
    session_destroy();
    
    $msg = "You've been successfully loged out";
    header("Location: /pages/login-register.php?error=".$msg);
?>