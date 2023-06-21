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
    <form action="home.php" method="post">
        <input type="submit" value="home">
    </form>

    <p><?php
        $row = $result->fetch_assoc();
        echo $row['name']."#".$row['id'];
    ?></p>

    <form action=""<?php echo "../php/pages/profile.php?id=".$id; ?> method="post">
        <p>Order by ?</p>
        <input type="radio" id="contactChoice1" name="filter" value="points" />
        <label for="contactChoice1">Points</label> <br>
        <input type="radio" id="contactChoice1" name="filter" value="kills" />
        <label for="contactChoice1">Kills</label> <br>
        <input type="radio" id="contactChoice1" name="filter" value="time" />
        <label for="contactChoice1">Time</label> <br>

        <p>Descending ?</p>
        <input type="radio" id="contactChoice1" name="order" value="order" />
        <label for="contactChoice1">Points</label> <br>
        
        <input type="submit" value="filter">
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
            <div>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <p>
                <?php echo "points : ".$row['points']; ?>
                <?php echo "kills : ".$row['kills']; ?>
                <?php echo "time : ".$row['time']; ?>
            </p>
            <?php
            }
            ?>
            </div>
        <?php
        }
        ?>
</body>
</html>