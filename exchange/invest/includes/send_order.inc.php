<?php
include 'check_availability.inc.php';
include 'display_error.inc.php';

function newMarketOrder($conn, $ticker, $type, $side, $price, $amountEUR, $username, $date){
    
    $validData = checkValidData('market', $price, NULL, $amountEUR);

    if($validData == true)
    {
        if($ticker == 'primary_market_pgeur'){
            if($type == 'market'){
                $canCreate = check_Availability($conn, $side, $ticker, NULL, $amountEUR, $username);  //Checks if user has enough funds
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

function newLimitOrder($conn, $ticker, $type, $side, $price, $amountRP, $username, $date){

    $validData = checkValidData('limit', $price, $amountRP, NULL);

    if($validData == true)
    {
        if($ticker == 'primary_market_pgeur'){
            if($type == 'limit'){   
                $canCreate = check_Availability($conn, $side, $ticker, NULL, $amountRP*$price, $username);  //Checks if user has enough funds
                if($canCreate == true){
                    $sql = "INSERT INTO secondary_market_pgeur_bid (username, price, amount_RP) 
                    VALUES ('$username', '$price', '$amountRP')";
                    $result = $conn->query($sql);
                    
                    
                }
            }
        }
    }
}

function checkValidData($type, $price, $amountRP, $amountEUR){

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
        if(is_numeric($price) && is_numeric($amountRP)){
            if($price < 0.01){
                display_error('903');
                return false;
            }
            if($amountRP < 5){
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