<?php 

function deleteOrder($conn, $orderType, $id){
    if($orderType=='buy'){
        $sql = "DELETE FROM mfeurbids WHERE id='$id'";
        $result = $conn->query($sql);
    }else if($orderType=='sell'){
        $sql = "DELETE FROM mfeurasks WHERE id='$id'";
        $result = $conn->query($sql);
    }
}

?>