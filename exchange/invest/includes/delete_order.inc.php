<?php 

function deleteOrder($conn, $ticker, $orderType, $order_id){    
    if($ticker == 'pgeur'){
        if($orderType=='buy'){
            //We get username and amount
            $sql = "SELECT * FROM open_orders WHERE order_id='$order_id'";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result)){
                $username = $row['username'];
                $amount_eur = $row['amount_RP'] * $row['price'];
            }

            //We delete order from public market
            $sql = "DELETE FROM secondary_market_pgeur_bid WHERE id='$order_id'";
            $result = $conn->query($sql);

            //We delete order from open_orders
            delete_open_order($conn, $order_id, $orderType, $ticker);

            //We return funds to the user
            $sql = "UPDATE users SET eur=eur+'$amount_eur' WHERE username='$username'";
            $result = $conn->query($sql);

        }else if($orderType=='sell'){
            //We get username and amount
            $sql = "SELECT * FROM open_orders WHERE order_id='$order_id'";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result)){
                $username = $row['username'];
                $amount_RP = $row['amount_RP'];
            }

            //We delete order from public market
            $sql = "DELETE FROM secondary_market_pgeur_ask WHERE id='$order_id'";
            $result = $conn->query($sql);

            //We delete order from open_orders
            delete_open_order($conn, $order_id, $orderType, $ticker);

            //We return funds to the user
            $sql = "UPDATE users SET pg=pg+'$amount_RP' WHERE username='$username'";
            $result = $conn->query($sql);
        }
    }    
}

?>