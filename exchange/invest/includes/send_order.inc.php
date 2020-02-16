<?php

function newMarketOrder($conn, $ticker, $type, $price, $amountEUR, $username, $date){
    
    $validData = checkValidData('market', $price, NULL, $amountEUR);

    if($validData == true)
    {
                   
    }
}

function newLimitOrder($conn, $ticker, $type, $price, $amountRP, $username, $date){

    $validData = checkValidData('limit', $price, $amountRP, $amountEUR);

}

function checkValidData($type, $price, $amountRP, $amountEUR){

    if($type == 'market'){
        if(is_numeric($price) && is_numeric($amountEUR)){
            if($price < 0.01){
                echo 'Error 903';
                return false;
            }
            return true;
        }else{
            echo 'Error 906';
            return false;
        }
    }else if($type == 'limit'){
        if(is_numeric($price) && is_numeric($amountRP)){
            if($price < 0.01){
                echo 'Error 903';
                return false;
            }
            if($amountRP < 5){
                echo 'Error 902';
                return false;
            }
            return true;
        }else{
            echo 'Error 906';
            return false;
        }
    } else return false;  
}
?>