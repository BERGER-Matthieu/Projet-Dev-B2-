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
    <title>Home</title>
</head>
<body>
    <form action="../php/log-out.php" method="post">
        <input type="submit" value="log out">
    </form>

    <p><?php
        $row = $result->fetch_assoc();
        echo "Welcome " . $row['name'];
    ?></p>

    <form action="profiles.php" method="post">
        <input type="text" id="home-friend-input" name="homeFriendInput" placeholder="Looking for someone ?">
        <input type="submit" value="enter">
    </form>

</body>
</html>