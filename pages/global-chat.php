<?php
    require_once("../php/connect.php");
    session_start();

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM messages INNER JOIN profile ON messages.senderId=profile.id WHERE receiverId IS NULL";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global chat</title>
</head>
<body>
    <form action="home.php" method="post">
        <input type="submit" value="home">
    </form>

    <div><?php
        while ($row = mysqli_fetch_assoc($result)) {?>
            <h2><?php
                echo $row['name'];
            ?></h2>
            <p><?php
                echo $row['content'];
            ?></p>
            <p><?php
                echo $row['time'];
            ?></p>
        <?php
        }
    ?></div>

    <form action="../php/message/add-global-message.php" method="post">
        <input type="text" placeholder="Enter your text here." name="messageContent" id="message-content">
        <input type="submit" value="send global message">
    </form>
</body>
</html>