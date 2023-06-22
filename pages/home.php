<?php
    require_once("../php/connect.php");
    session_start();

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM profile WHERE id = $id";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/home.css">
    <title>Home</title>
</head>
<body>
    <form action="../php/login/log-out.php" method="post">
        <input id="logout" type="submit" value="log out">
    </form>

    <div id="full-block">
        <div id="name">
            <h2><?php
            $row = $result->fetch_assoc();
            echo "Welcome " . $row['name'];
            ?></h2>
        </div>
    
        <div id="buttons">
            <div id="profiles">
                <form action="profiles.php" method="post">
                    <input type="text" id="home-friend-input" name="homeFriendInput" placeholder="Looking for someone ?">
                    <br>
                    <input type="submit" value="enter">
                </form>
            </div>

            <form action="friends-list.php" method="post">
                <input type="submit" value="friends">
            </form>

            <form action="global-chat.php" method="post">
                <input type="submit" value="global">
            </form>

            <form action="forum.php" method="post">
                <input type="submit" value="forum">
            </form>

            <form action="<?php echo "profile.php?id=".$id; ?>" method="post">
                <input type="submit" value="profile">
            </form>
        </div>
    </div>
</body>
</html>