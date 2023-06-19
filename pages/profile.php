<?php
    require_once("../php/connect.php");
    session_start();

    if (!isset($_GET['id'])) {
        header("Location: http://localhost/Projet-Dev-B2-/pages/home.php");
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM profile WHERE id=$id";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
</head>
<body>
    <?php
        if ($id == $_SESSION['id']){
            ?>
                <form action="home.php" method="post">
                    <input type="submit" value="home">
                </form>
            <?php
        } else {    
            ?>
                <form action="friends-list.php" method="post">
                    <input type="submit" value="friends">
                </form>
            <?php
        }
    ?>
    

    <p><?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?></p>

    <p><?php
        $row = $result->fetch_assoc();
        echo $row['name'];
    ?></p>
</body>
</html>