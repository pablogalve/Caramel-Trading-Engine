<?php

function checkMatch($conn){
    //Get biggest bid
    //Get smallest ask
    //Bid >= Ask ?
    //Get bid ID
    //Get ask ID    
    //Get bid amount
    //Get ask amount
    //Get smallest amount between bid and ask
    //Get who is maker and who is taker
    //price = maker's price
    //exchange($conn);
}

function exchange($conn){
    //Update orderbook: Delete matched amounts from bid and ask orderbooks
    //Update balances: Seller increases EUR balance and buyer increases PG balance
    //Add trade to LastTradesList
    
    //Recursive function to ensure that there not unfilled matches
    checkMatch($conn);
}

function addToLastTrades($conn, $ticker, $id, $type, $price, $amount_RP){
    $date = date('Y-m-d H:i:s a', time());   
    $username = '';
    $amount_EUR = $price*$amount_RP;

    switch($ticker){
        case 'pgeur':
            //if($type = 'buy') //$username = GetBuyerName();
            //else if($type ='sell') //$username = GetSellerName();
        break;
        case 'loaneur':
            //if($type = 'buy') //$username = GetBuyerName();
            //else if($type ='sell') //$username = GetSellerName();
        break;
        default:
        //Error. This should not happen
        break;
    }
    
    //$sql = INSERT INTO trades (`id`, `username`, `price`, `orderType`, `amount_RP`, `amount_EUR`, `date`)
    //VALUES (NULL, '$username', '$price', '$type', '$amount_RP', '$amount_EUR, '$date')";
    $result = $conn->query($sql);    
}
?>