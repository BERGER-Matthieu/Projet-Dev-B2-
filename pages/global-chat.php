<?php
    require_once("../php/connect.php");
    session_start();

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM profile WHERE id = $id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $isAdmin = $row['isAdmin'];

    $sql = "SELECT * FROM messages INNER JOIN profile ON messages.senderId=profile.id WHERE receiverId IS NULL";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/global.css">
    <title>Global chat</title>
</head>
<body>
    <form action="home.php" method="post">
        <input id="home" type="submit" value="home">
    </form>

    <div id="full-block">
    
        <div><?php
            while ($row = mysqli_fetch_assoc($result)) {?>
                <div class="message-block">
                    <h2><?php
                        echo $row['name'];
                    ?></h2>
                    <p><?php
                        echo $row['content'];
                    ?></p>
                    <p class="time"><?php
                        echo $row['time'];
                    ?></p>
                    <?php
                        if($isAdmin) {
                    ?>
                    <form action="<?php echo "../php/crud/remove-global-message.php?id=".$row['messageId']; ?>" method="post">
                        <input class="remove" type="submit" value="remove">
                    </form>
                    <?php
                    }   
                    ?>
                </div>
            <?php
            }
        ?></div>

        <div class="message-block" id="add-post">
            <form action="../php/message/add-global-message.php" method="post">
                <input type="text" placeholder="Enter your text here." name="messageContent" id="message-content">
                <input type="submit" value="send global message">
            </form>
        </div>
    </div>
</body>
</html>