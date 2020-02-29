<?php
include 'get_data.inc.php';
include 'getMarketMaker.inc.php';
include 'update_orderbook.inc.php';
//include 'update_balances.inc.php';

function checkMatch($conn, $ticker){
    $bid = getBiggestBid($conn, $ticker);
    $ask = getSmallestAsk($conn, $ticker);
        
    if($bid >= $ask){
        $bid_ID = getBuyOrderID($conn, $ticker);
        $ask_ID = getSellOrderID($conn, $ticker);
        if($bid_ID == NULL || $ask_ID == NULL)exit;

        $bid_Amount_RP = getBuyAmount_RP($conn, $ticker, $bid_ID);
        $ask_Amount_RP = getSellAmount_RP($conn, $ticker, $ask_ID);
        if($bid_Amount_RP == NULL || $ask_Amount_RP == NULL)exit;

        //Get smallest amount between bid and ask
        if($bid_Amount_RP <= $ask_Amount_RP)$exchange_Amount_RP = $bid_Amount_RP;
        else if($bid_Amount_RP > $ask_Amount_RP) $exchange_Amount_RP = $ask_Amount_RP;
        else exit;

        //Get exchange price
        $MarketMaker = getMarketMaker($conn, $ticker, $bid_ID, $ask_ID); 
        if($MarketMaker == 'buyer')$exchangePrice = $bid;
        else if($MarketMaker == 'seller')$exchangePrice = $ask;
        else exit;

        exchange($conn, $ticker, $exchangePrice, $exchange_Amount_RP, $bid_ID, $ask_ID);
    }
}

function exchange($conn, $ticker, $price, $amount_RP, $bid_ID, $ask_ID){
    
    //Update balances: Seller increases EUR balance and buyer increases PG balance
    {
        $buyerName = getBuyerName($conn, $ticker, $bid_ID);
        $sellerName = getBuyerName($conn, $ticker, $ask_ID);

        $amount_EUR = $amount_RP * $price;

        updateBalance($conn, $amount_RP, $amount_EUR, $sellerName, 'eur');
        if($ticker == 'pgeur')
            updateBalance($conn, $amount_RP, $amount_EUR, $buyerName, 'pg');
    }
    addToLastTrades($conn, $ticker, $buyerName, 'buy', $price, $amount_RP);
    addToLastTrades($conn, $ticker, $sellerName, 'sell', $price, $amount_RP);

    updateOrderBook($conn, $ticker, 'buy', $amount_RP, $bid_ID);
    updateOrderBook($conn, $ticker, 'sell', $amount_RP, $ask_ID);
    
    //Recursive function to ensure that there not unfilled matches
    checkMatch($conn, $ticker);
}

function addToLastTrades($conn, $ticker, $username, $type, $price, $amount_RP){
    $date = date('Y-m-d H:i:s a', time());

    $sql = "INSERT INTO trades (username, price, ticker, type, amount_RP, date)
    VALUES ('$username', '$price', '$ticker', '$type', '$amount_RP', '$date')";

    $result = $conn->query($sql);    
}
?>