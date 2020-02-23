<?php 

function deleteOrder($conn, $ticker, $orderType, $order_id){
    if($ticker == 'pgeur'){
        if($orderType=='buy'){
            $sql = "DELETE FROM secondary_market_pgeur_bid WHERE id='$order_id'";
            $result = $conn->query($sql);
        }else if($orderType=='sell'){
            $sql = "DELETE FROM secondary_market_pgeur_ask WHERE id='$order_id'";
            $result = $conn->query($sql);
        }
    }    
}

?>