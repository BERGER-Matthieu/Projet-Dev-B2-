<?php
    function checkFriend($id1, $id2){
        global $conn;
        $sql = "SELECT * FROM friends WHERE userId = '$id1' and friendId = '$id2'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            return [FALSE, "He's already your friend"];
        }

        return [TRUE, "No errors"];
    }
?>