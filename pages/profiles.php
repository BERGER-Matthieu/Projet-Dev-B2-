<?php
    require_once("../php/connect.php");
    session_start();

    $name = "";
    if (isset($_POST['homeFriendInput'])) {
        $name = $_POST['homeFriendInput'];
    }

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM profile WHERE id != $id and name LIKE '%$name%'";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiles</title>
</head>
<body>
    <form action="home.php" method="post">
        <input type="submit" value="home">
    </form>

    <p><?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?></p>
    
    <form action="profiles.php" method="post">
        <input type="text" id="home-friend-input" name="homeFriendInput" placeholder="Looking for someone ?">
        <input type="submit" value="enter">
    </form>

    <div><?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <p><?php echo $row['name'] . "#" . $row['id'];?></p>
            <form action="<?php echo "../php/friends/add-friend.php?id=".$row['id']; ?>" method="post">
                <input type="submit" value="add friend">
            </form>
            <form action="<?php echo "profile.php?id=".$row['id']; ?>" method="post">
                <input type="submit" value="profile">
            </form>
            <?php
        }
    ?></div>
</body>
</html>