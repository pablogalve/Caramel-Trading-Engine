<?php
include 'check_availability.inc.php';
include 'display_error.inc.php';
include 'update_balances.inc.php';
include 'match_engine.inc.php';
include 'update_open_orders.inc.php';

function newLimitOrder($conn, $ticker, $type, $price, $amount_RP, $username, $date){

    $validData = checkValidData('limit', $price, $amount_RP, NULL);

    if($validData == true){
        if($ticker == 'pgeur'){
            if($type == 'buy'){   
                $canCreate = check_Availability($conn, $type, $ticker, NULL, $amount_RP * $price, $username);  //Checks if user has enough funds
                if($canCreate == true){
                    $sql = "INSERT INTO secondary_market_pgeur_bid (username, price, amount_RP) 
                    VALUES ('$username', '$price', '$amount_RP')";
                    $result = $conn->query($sql); 
                    if($result){
                        updateBalance($conn, NULL, -($amount_RP*$price), $username, "eur");
                        create_open_order($conn, $price, $amount_RP, $date, $username, $ticker, $type);
                        checkMatch($conn, $ticker);
                    }else die("Connection failed: " . $conn->connect_error);    
                }
            }else if($type == 'sell'){
                $canCreate = check_Availability($conn, $type, $ticker, $amount_RP, NULL, $username);  //Checks if user has enough funds
                if($canCreate == true){
                    $sql = "INSERT INTO secondary_market_pgeur_ask (username, price, amount_RP) 
                    VALUES ('$username', '$price', '$amount_RP')";
                    $result = $conn->query($sql); 
                    if($result){
                        updateBalance($conn, -$amount_RP, NULL, $username, "pg");
                        checkMatch($conn, $ticker);
                    }else die("Connection failed: " . $conn->connect_error);                     
                }
            }
        }
    }
}

function newMarketOrder($conn, $ticker, $type, $price, $amountEUR, $username, $date){
    
    $validData = checkValidData('market', $price, NULL, $amountEUR);

    if($validData == true){
        if($ticker == 'pgeur'){
            if($type == 'buy'){
                $canCreate = check_Availability($conn, $type, $ticker, NULL, $amountEUR, $username);  //Checks if user has enough funds
                if($canCreate == true){                    
                    $sql = "SELECT price FROM primary_market_pgeur_ask ORDER BY price ASC LIMIT 1";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_array($result);
                    
                    if($price >= $row['price']){
                        //TODO: Market orders
                    }
                }
            }
        }
    }
}

function checkValidData($type, $price, $amount_RP, $amountEUR){

    if($type == 'market'){
        if(is_numeric($price) && is_numeric($amountEUR)){
            if($price < 0.01){
                display_error('903');
                return false;
            }
            return true;
        }else{
            display_error('906');
            return false;
        }
    }else if($type == 'limit'){
        if(is_numeric($price) && is_numeric($amount_RP)){
            if($price < 0.01){
                display_error('903');
                return false;
            }
            if($amount_RP < 5){
                display_error('902');
                return false;
            }
            return true;
        }else{
            display_error('906');
            return false;
        }
    } else return false;  
}
?>