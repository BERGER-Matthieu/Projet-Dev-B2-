<?php
    require_once("../php/connect.php");
    session_start();

    $id = $_SESSION['id'];
    $friendId = $_GET['id'];
    $sql = "SELECT * FROM messages INNER JOIN profile ON messages.senderId=profile.id WHERE (senderId=$id AND receiverId=$friendId) OR (senderId=$friendId AND receiverId=$id) ORDER BY time";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Chat</title>
</head>
<body>
    <div><?php
        while ($row = mysqli_fetch_assoc($result)) {?>
        <div style="width:200px;">
            <h2><?php
                echo $row['name'];
            ?></h2>
            <p><?php
                echo $row['content'];
            ?></p>
            <p><?php
                echo $row['time'];
            ?></p>
        </div>
        <?php
        }
    ?></div>
</body>
</html>