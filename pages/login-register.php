<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/login-register.css">
    <title>Login-Register</title>
</head>
<body>
    <div id="full-block">
        <div id="title">
            <h1>Login-Register</h1>
            <p><?php
                if(isset($_GET['error'])){
                        echo $_GET['error'];
                }
            ?></p>
        </div>
        <div id="login-and-register">
            <form action="../php/login/login.php" method="post">
                <div id = "login">
                    <input type="text" id="login-name-or-email" name="loginNameOrEmail" placeholder="name or email">
                    <br>
                    <input type="password" id="login-password" name="loginPassword" placeholder="password">
                    <br>
                    <input type="submit" value="log in">
                </div>
            </form>

            <form action="../php/login/register.php" method="post">
                <div id = "register">
                    <input type="text" maxlength="20" id="register-name" name="registerName" placeholder="name (20 char max)">
                    <br>
                    <input type="email" maxlength="255" id="register-email" name="registerEmail" placeholder="email">
                    <br>
                        <input type="password" maxlength="255" id="register-password1" name="registerPassword1" placeholder="password">
                    <br>
                    <input type="password" maxlength="255" id="register-password2" name="registerPassword2" placeholder="confirm password">
                    <br>
                    <input type="submit" value="register">
            </div>
        </form>
    </div>
    </div>
</body>
</html>