<?php
    require_once("../php/connect.php");
    session_start();

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM post INNER JOIN profile ON post.creatorId=profile.id";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<body>
    <form action="home.php" method="post">
        <input type="submit" value="home">
    </form>

    <form action="post-creation.php" method="post">
        <input type="submit" value="add post">
    </form>

    <div><?php
        while ($row = mysqli_fetch_assoc($result)) {?>
            <h2>
                <a href=<?php echo "post.php?id=".$row['postId']?>>
                    <?php echo $row['title']; ?>
                </a>  
            </h2>
            <p><?php
                echo $row['name']." at : ".$row['time'];
            ?></p> 
        <?php
        }
    ?></div>
</body>
</html>