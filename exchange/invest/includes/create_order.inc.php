<?php
include 'send_order.inc.php';

function create_limit_order($conn){
    if(isset($_POST['submit_buy'])){       
        $price = $_POST['price'];  
       
        $ticker = $_POST['ticker'];
        $type = 'buy';
        $date = $_POST['date'];    
       
        if(isset($_POST['amount_RP']))$amount_RP = $_POST['amount_RP'];
        if(isset($_POST['amount_EUR']))$amount_EUR = $_POST['amount_EUR'];

        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            newLimitOrder($conn, $ticker, $type, $price, $amount_RP, $username, $date);
        }else display_error('800');
    }
    else if(isset($_POST['submit_sell'])){       
        $price = $_POST['price'];      
        
        $username = $_SESSION['username'];
        $ticker = $_POST['ticker'];
        $type = 'sell';
        $date = $_POST['date'];
         
        if(isset($_POST['amount_RP']))$amount_RP = $_POST['amount_RP'];
        if(isset($_POST['amount_EUR']))$amount_EUR = $_POST['amount_EUR'];
        
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            newLimitOrder($conn, $ticker, $type, $price, $amount_RP, $username, $date);
        }else display_error('800');
     }
}

function create_market_order($conn){
    if(isset($_POST['submit_buy'])){  

    }
    else if(isset($_POST['submit_sell'])){       

    }
}

?>