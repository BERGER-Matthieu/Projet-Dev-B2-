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
    <title>Chat</title>
</head>
<body>
    <form action="friends-list.php" method="post">
        <input type="submit" value="friends">
    </form>

    <iframe src="<?php echo "/pages/display-chat.php?id=".$friendId; ?>" name="chatIframe" id="chat-iframe"></iframe>

    <form action="<?php echo "../php/message/add-message.php?id=".$friendId; ?>" method="post">
        <input type="text" placeholder="Enter your text here." name="messageContent" id="message-content">
        <input type="submit" value="send message">
    </form>
</body>
</html>