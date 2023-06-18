<?php
    function isFriend($id1, $id2){
        global $conn;
        $sql = "SELECT * FROM friends WHERE userId = '$id1' and friendId = '$id2'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            return [TRUE, "He's already your friend"];
        }

        return [FALSE, "He's not your friend"];
    }
?>