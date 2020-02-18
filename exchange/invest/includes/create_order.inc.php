<?php
include 'send_order.inc.php';

function create_order($conn){
    if(isset($_POST['submit_buy'])){       
       $price = $_POST['price'];      
       
       $username = $_SESSION['username'];
       $ticker = $_POST['ticker'];
       $type = $_POST['type'];
       $side = 'buy';
       $date = $_POST['date'];
        
       if(isset($_POST['amount_RP']))$amount_RP = $_POST['amount_RP'];
       if(isset($_POST['amount_EUR']))$amount_EUR = $_POST['amount_EUR'];

        if($type == 'market')newMarketOrder($conn, $ticker, $type, $side, $price, $amount_EUR, $username, $date);
        if($type == 'limit')newLimitOrder($conn, $ticker, $type, $side, $price, $amount_RP, $username, $date);
    }
}

?>