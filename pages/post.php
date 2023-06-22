<?php
    require_once("../php/connect.php");
    session_start();

    $id = $_GET['id'];
    $sql = "SELECT * FROM post INNER JOIN profile ON post.creatorId=profile.id WHERE postId=$id";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/post.css">
    <title>Post</title>
</head>
<body>
    <form action="forum.php" method="post">
        <input id="forum" type="submit" value="forum">
    </form>

    <div id="full-block"><?php
        while ($row = mysqli_fetch_assoc($result)) {?>
            <div class="message-block">
                <h2><?php
                    echo $row['title'];
                ?></h2>
                <a href=<?php echo "profile.php?id=".$row['id']; ?>><?php
                    echo $row['name'];
                ?></a>
                <p><?php
                    echo $row['content'];
                ?></p>
            </div>
        <?php
        }
    ?></div>
</body>
</html>