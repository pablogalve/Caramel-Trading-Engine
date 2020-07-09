<?php 

function deleteOrder($conn, $ticker, $orderType, $order_id){    
    if($ticker == 'pgeur'){
        if($orderType=='buy'){
            $sql = "DELETE FROM secondary_market_pgeur_bid WHERE id='$order_id'";
            $result = $conn->query($sql);

            $sql = "DELETE FROM open_orders WHERE order_id='$order_id' AND order_type='$orderType' AND ticker='$ticker'";
            $result = $conn->query($sql);
        }else if($orderType=='sell'){
            $sql = "DELETE FROM secondary_market_pgeur_ask WHERE id='$order_id'";
            $result = $conn->query($sql);
        }
    }    
}

?>