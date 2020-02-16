<?php
include 'send_order.inc.php';

function create_order($conn){
    if(isset($_POST['submit_buy'])){       
       $price = $_POST['price'];      
       
       $username = $_SESSION['username'];
       $ticker = $_POST['ticker'];
       $type = $_POST['type'];
       $date = $_POST['date'];

        if($type == 'market_buy'){
            $amount_EUR = $_POST['amount_EUR'];
            newMarketOrder($conn, $ticker, $type, $price, $amount_EUR, $username, $date);
        }
        if($type == 'limit_buy'){
            $amount_RP = $_POST['amountRP'];
            //newLimitOrder($conn, $ticker, $type, $price, $amountRP, $username, $date);
        }
    }
}

?>