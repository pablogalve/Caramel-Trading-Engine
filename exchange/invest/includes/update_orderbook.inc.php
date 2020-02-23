<?php
include 'delete_order.inc.php';

function updateOrderBook($conn, $ticker, $orderType, $amount_RP, $order_id){  
    //We use this to update a partial filled order or delete the order
    if($ticker == 'pgeur'){
        if($orderType=='buy'){
            $sql = "UPDATE secondary_market_pgeur_bid SET amount_RP=amount_RP-'$amount_RP' WHERE id='$order_id'";   
            $result = $conn->query($sql);
            
            //Check if amount is 0 or less. If true, it deletes the order
            $sql2 = "SELECT * FROM secondary_market_pgeur_bid WHERE id='$order_id'";
            $result2 = $conn->query($sql2);
    
            while($row = mysqli_fetch_assoc($result2)){
                if($row['amount_RP'] <= 0)deleteOrder($conn, $ticker, 'buy', $order_id);            
            }
        }else if($orderType=='sell'){
            $sql = "UPDATE secondary_market_pgeur_ask SET amount_RP=amount_RP-'$amount_RP' WHERE id='$order_id'";   
            $result = $conn->query($sql);
            
            //Check if amount is 0 or less. If true, it deletes the order
            $sql2 = "SELECT * FROM secondary_market_pgeur_ask WHERE id='$order_id'";
            $result2 = $conn->query($sql2);
    
            while($row = mysqli_fetch_assoc($result2)){
                if($row['amount_RP'] <= 0)deleteOrder($conn, $ticker, 'sell', $order_id);            
            }
        }
    }    
}
?>