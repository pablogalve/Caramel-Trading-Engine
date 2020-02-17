<?php
include 'check_availability.inc.php';
include 'display_error.inc.php';

function newMarketOrder($conn, $ticker, $type, $price, $amountEUR, $username, $date){
    
    $validData = checkValidData('market', $price, NULL, $amountEUR);

    if($validData == true)
    {
        if($ticker == 'primary_market_pgeur'){
            if($type == 'market_buy'){
                $canCreate = check_Availability($conn, $type, $ticker, NULL, $amountEUR, $username);  //Checks if user has enough funds
                if($canCreate == true) echo 'funciona';
            }
        }
    }
}

function newLimitOrder($conn, $ticker, $type, $price, $amountRP, $username, $date){

    $validData = checkValidData('limit', $price, $amountRP, $amountEUR);

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