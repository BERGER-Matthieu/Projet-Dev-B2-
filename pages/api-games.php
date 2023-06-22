<?php
    require_once("../php/connect.php");
    session_start();

    $sql = "SELECT * FROM games";

    $result = $conn->query($sql);

    if($result){
        $i = 0;
        header("Content-Type: JSON");
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['gameId'] = $row['gameId'];
            $response[$i]['playerId'] = $row['playerId'];
            $response[$i]['points'] = $row['points'];
            $response[$i]['time'] = $row['time'];
            $response[$i]['kills'] = $row['kills'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
?>