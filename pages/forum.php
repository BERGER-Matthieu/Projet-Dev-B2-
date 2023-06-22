<?php
    require_once("../php/connect.php");
    session_start();

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM profile WHERE id = $id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    $isAdmin = $row['isAdmin'];

    $sql = "SELECT * FROM post INNER JOIN profile ON post.creatorId=profile.id";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/forum.css">
    <title>Forum</title>
</head>
<body>
    <form action="home.php" method="post">
        <input id="home" type="submit" value="home">
    </form>

    <form action="post-creation.php" method="post">
        <input id="add-post"type="submit" value="add post">
    </form>

    <div id="full-block"><?php
        while ($row = mysqli_fetch_assoc($result)) {?>
            <div class="message-block"> 
                <h2>
                    <a href=<?php echo "post.php?id=".$row['postId']?>>
                        <?php echo $row['title']; ?>
                    </a>  
                </h2>
                <p class="time"><?php
                    echo $row['name']." at : ".$row['time'];
                ?></p> 
                <?php
                    if($isAdmin) {
                ?>
                <form action="<?php echo "../php/crud/remove-post.php?id=".$row['postId']; ?>" method="post">
                    <input class="remove" type="submit" value="remove">
                </form>
                <?php
                }   
                ?>
            </div>
        <?php
        }
    ?></div>
</body>
</html>