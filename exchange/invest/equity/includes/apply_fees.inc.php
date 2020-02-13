<?php

function ApplyFees($conn, $type, $amount, $maker){
    //Definitions
    $makerTradingFee = 0; //fees are expressed in percentage
    $takerTradingFee = 0;
    
    switch($type){
        case 'trading':
            if($maker == 1){
                return $amount * $makerTradingFee;
            }else if($maker == 0){
                return $amount * $takerTradingFee;
            }
            break;
        default:
            return 0;
            break;
    }
}

?>