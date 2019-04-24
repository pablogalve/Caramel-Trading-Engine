<?php
include '../dbh.php';
include 'update_balances.inc.php';
include 'delete_order.inc.php';
include 'update_orderbook.inc.php';
include 'getMarketMaker.inc.php';
include 'get_data.inc.php';
include 'apply_fees.inc.php';

date_default_timezone_set('Europe/Tallinn');

function checkMatch($conn){
    $bid = getBiggestBid($conn, 'mfeur'); 
    $ask = getSmallestAsk($conn, 'mfeur'); 
    
    if($bid >= $ask){
        $bidID = getBuyOrderID($conn, 'mfeur');
        $askID = getSellOrderID($conn, 'mfeur');
        
        $MarketMaker = getMarketMaker($conn, 'mfeur', $bidID, $askID); //Who is the market maker and who is the taker?
        $buyAmount = getBuyAmount($conn, 'mfeur', $bidID); //Amount that the biggest bid has available
        $sellAmount = getSellAmount($conn, 'mfeur', $askID); //Amount that the smallest ask has available
        //$buyAmountEUR = getBuyAmountEUR($conn, 'mfeur', $bidID);
        //$sellAmountEUR = getSellAmountEUR($conn, 'mfeur', $askID);
       
        if($buyAmount <= $sellAmount){ //Compare amounts listed by bid and ask and exchange the smallest
            $exchangeAmount = $buyAmount;
        }else if($sellAmount < $buyAmount){
            $exchangeAmount = $sellAmount;
        }
       
        if($MarketMaker == 1){  // 1) Maker=buyer. Taker=seller
            $exchangePrice= $bid;
        }else if($MarketMaker==0){  // 0) Maker=seller. Taker=buyer
            $exchangePrice= $ask;
        }  
        $exchangeAmountEUR = $exchangePrice * $exchangeAmount;
        
        exchange($conn, $exchangePrice, $exchangeAmount, $exchangeAmountEUR, $bidID, $askID, $MarketMaker);
    }
}
function exchange($conn, $exchangePrice, $exchangeAmount, $exchangeAmountEUR, $bidID, $askID, $maker){
    //Now let's get buyer data from user's database to proceed to exchange
    $buyerName = getBuyerName($conn, 'mfeur', $bidID); //Username of the buyer
    
    $bidmf = getUserData($conn, $buyerName, "mf");
    $bidmfAvailable = getUserData($conn, $buyerName, "mfAvailable");
    $bideur = getUserData($conn, $buyerName, "eur");
    $bideurAvailable = getUserData($conn, $buyerName, "eurAvailable");
    
    //Now let's get data from the seller user
    $sellerName= getSellerName($conn, 'mfeur', $askID); //USername of the seller
    
    $askmf = getUserData($conn, $sellerName, "mf");
    $askmfAvailable = getUserData($conn, $sellerName, "mfAvailable");
    $askeur = getUserData($conn, $sellerName, "eur");
    $askeurAvailable = getUserData($conn, $sellerName, "eurAvailable");
    
    updateOrderBook($conn, 'buy', $exchangeAmount, $bidID);
    updateOrderBook($conn, 'sell', $exchangeAmount, $askID);
    echo'maker is:'.$maker;
    if($maker == 1){ //Maker is buyer
        $buyerFee = ApplyFees($conn, 'trading', $exchangeAmount, 1); //Apply Fee to buyer
        $sellerFee = ApplyFees($conn, 'trading', $exchangeAmountEUR, 0); //Apply EUR Fee to seller
        
        addToLastTrades($conn, 'mfeur', $exchangePrice, $exchangeAmount, $exchangeAmountEUR, 'buy', $buyerName, $buyerFee, 0);
        addToLastTrades($conn, 'mfeur', $exchangePrice, $exchangeAmount, $exchangeAmountEUR, 'sell', $sellerName, 0, $sellerFee);
    }else if($maker == 0){ //Maker is seller
        $sellerFee = ApplyFees($conn, 'trading', $exchangeAmountEUR, 1); //Apply Fee to seller
        $buyerFee = ApplyFees($conn, 'trading', $exchangeAmount, 0); //Apply Fee to buyer
        
        addToLastTrades($conn, 'mfeur', $exchangePrice, $exchangeAmount, $exchangeAmountEUR, 'buy', $buyerName, $buyerFee, 0);
        addToLastTrades($conn, 'mfeur', $exchangePrice, $exchangeAmount, $exchangeAmountEUR, 'sell', $sellerName, 0, $sellerFee);
    }
    updateBalance($conn, $exchangeAmount, $exchangeAmountEUR, $buyerName, 'buyer', $buyerFee, 0);
    updateBalance($conn, $exchangeAmount, $exchangeAmountEUR, $sellerName, 'seller', 0, $sellerFee);
    
    //Check to see if there is more than one match
    checkMatch($conn);
}

function addToLastTrades($conn, $ticker, $exchangePrice, $exchangeAmount, $ExchangeAmountEUR, $orderType, $username, $feeRP, $feeEUR){
    $date = date('Y-m-d H:i:s a', time());
   
    if($ticker=='mfeur'){
        $sql = "INSERT INTO `mfeurtrades`(`id`, `username`, `price`, `orderType`, `amountRP`, `amountEUR`, `feeRP`, `feeEUR`, `date`) 
            VALUES (NULL,'$username','$exchangePrice','$orderType','$exchangeAmount',' $ExchangeAmountEUR,','$feeRP','$feeEUR','$date')";
        $result = $conn->query($sql);
    }
    
}
?>