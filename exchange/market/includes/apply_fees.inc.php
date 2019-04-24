<?php

function ApplyFees($conn, $type, $amount, $maker){
    //Definitions
    $makerTradingFee = 0;
    $takerTradingFee = 0.003;
    
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