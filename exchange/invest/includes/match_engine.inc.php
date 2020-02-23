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

function addToLastTrades($conn, $ticker, $price, $amount_RP, $amount_EUR, $orderType, $username){
    $date = date('Y-m-d H:i:s a', time());
   
    if($ticker=='pgeur'){
        //$sql = INSERT INTO trades ...
        $result = $conn->query($sql);
    }
}
?>