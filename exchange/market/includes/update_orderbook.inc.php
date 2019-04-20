<?php
function updateOrderBook($conn, $orderType, $amount, $id){  //We use to update a partial filled order
    if($orderType=='buy'){
        $sql = "UPDATE mfeurbids SET amountRP=amountRP-'$amount' WHERE id='$id'";   
        $result = $conn->query($sql);
        
        //Check if amount is 0 or less. If true, it deletes the order
        $sql2 = "SELECT * FROM mfeurbids WHERE id='$id'";
        $result2 = $conn->query($sql2);
        while($row = mysqli_fetch_assoc($result2)){
            if($row['amountRP']<=0){
                deleteOrder($conn, 'buy', $id);
            }
        }
    }else if($orderType=='sell'){
        $sql = "UPDATE mfeurasks SET amountRP=amountRP-'$amount' WHERE id='$id'";   
        $result = $conn->query($sql);
        
        //Check if amount is 0 or less. If true, it deletes the order
        $sql2 = "SELECT * FROM mfeurasks WHERE id='$id'";
        $result2 = $conn->query($sql2);
        while($row = mysqli_fetch_assoc($result2)){
            if($row['amountRP']<=0){
                deleteOrder($conn, 'sell', $id);
            }
        }
    }
}
?>