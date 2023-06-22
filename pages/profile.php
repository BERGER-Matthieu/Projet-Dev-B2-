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
    <link rel="stylesheet" type="text/css" href="../style/profile.css">
    <title>Friends</title>
</head>
<body>
    <form action="home.php" method="post">
        <input id="home" type="submit" value="home">
    </form>

    <div id="full-block">
    <div id="name">
        <h2><?php
            $row = $result->fetch_assoc();
            echo $row['id']."# ".$row['name'];
        ?></h2>
    </div>
        <form action=""<?php echo "../php/pages/profile.php?id=".$id; ?> method="post">
            <div class="filter-block"> 
            <h3>Order by ?</h3>
                <input type="radio" id="contactChoice1" name="filter" value="points" />
                <p for="contactChoice1">Points</p> 
                <input type="radio" id="contactChoice1" name="filter" value="kills" />
                <p for="contactChoice1">Kills</p> 
                <input type="radio" id="contactChoice1" name="filter" value="time" />
                <p for="contactChoice1">Time</p> 
                <br>
                <h3>Descending ?</h3>
                <input type="radio" id="contactChoice1" name="order" value="order" />
                <p for="contactChoice1">Yes</p> <br>
            
                <input type="submit" value="filter">
            </div>
        </form>

    <?php
        $id = $_GET['id'];

        if(isset($_POST['filter'])){
            $filter = $_POST['filter'];
            $sql = "SELECT * FROM profile INNER JOIN games ON games.playerId=profile.id  WHERE id=$id ORDER BY $filter";
        } else {
            $sql = "SELECT * FROM profile INNER JOIN games ON games.playerId=profile.id  WHERE id=$id ORDER BY gameId";
        }

        if(isset($_POST['order'])){
            $sql .= " DESC";
        }
        $result = $conn->query($sql);

        if($result->num_rows > 0) {?>
            <div class="score-block">
            <p id="points">Points</p>
            <p id="kills">Kills</p>
            <p id="time">Time</p>
            </div>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="score-block">
            <p id="points">
                <?php echo $row['points']; ?>
            </p>
            <p id="kills">
                <?php echo $row['kills']; ?>
            </p>
            <p id="time">
                <?php echo $row['time']; ?>
            </p>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>