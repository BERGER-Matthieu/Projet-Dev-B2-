<?php
    require_once("connect.php");

    $nameOrEmail = $_POST['loginNameOrEmail'];
    $password = $_POST['loginPassword'];

    $sql = "SELECT * FROM profile WHERE ( email = '$nameOrEmail' OR name = '$nameOrEmail' ) AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        echo "patate";
    } else {
        echo "pas patate";
    }
?>