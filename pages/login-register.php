<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Register</title>
</head>
<body>
    <h1>Login-Register</h1>
    <p><?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?></p>
    <form action="../php/login/login.php" method="post">
        <div id = "login">
            <input type="text" id="login-name-or-email" name="loginNameOrEmail" placeholder="name or email">
            <input type="password" id="login-password" name="loginPassword" placeholder="password">
            <input type="submit" value="log in">
        </div>
    </form>

    <form action="../php/login/register.php" method="post">
        <div id = "register">
            <input type="text" id="register-name" name="registerName" placeholder="name">
            <input type="email" id="register-email" name="registerEmail" placeholder="email">
            <input type="password" id="register-password1" name="registerPassword1" placeholder="password">
            <input type="password" id="register-password2" name="registerPassword2" placeholder="confirm password">
            <input type="submit" value="register">
        </div>
    </form>
</body>
</html>