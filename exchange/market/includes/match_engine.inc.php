<?php
include '../dbh.php';
include 'update_balances.inc.php';
include 'delete_order.inc.php';
include 'update_orderbook.inc.php';

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
       
        if($buyAmount <= $sellAmount){ //Compare amounts listed by bid and ask and exchange the smallest
            $exchangeAmount = $buyAmount;
        }else if($sellAmount < $buyAmount){
            $exchangeAmount = $sellAmount;
        }
       
        if($MarketMaker == 1){  // 1) Maker=buyer. Taker=seller
            $exchangePrice= $bid;
            //$exchangeFunds= 1;
            
            exchange($conn, $exchangePrice, $exchangeAmount, $bidID, $askID);
            
        }else if($MarketMaker==0){  // 0) Maker=seller. Taker=buyer
            $exchangePrice= $ask;
            //$exchangeFunds= 1; 
            
            exchange($conn, $exchangePrice, $exchangeAmount, $bidID, $askID);
        }  
    }
}
function exchange($conn, $exchangePrice, $exchangeAmount, $bidID, $askID){
    //Now let's get buyer data from user's database to proceed to exchange
    $buyerName = getBuyerName($conn, 'mfeur', $bidID); //Username of the buyer
    
    $bidmf = getUserData($conn, $buyerName, "mf");
    $bidmfAvailable = getUserData($conn, $buyerName, "mfAvailable");
    $bideur = getUserData($conn, $buyerName, "eur");
    $bideurAvailable = getUserData($conn, $buyerName, "eurAvailable");
    
    //Now let's get data from the seller user user
    $sellerName= getSellerName($conn, 'mfeur', $askID); //USername of the seller
    
    
    $askmf = getUserData($conn, $sellerName, "mf");
    $askmfAvailable = getUserData($conn, $sellerName, "mfAvailable");
    $askeur = getUserData($conn, $sellerName, "eur");
    $askeurAvailable = getUserData($conn, $sellerName, "eurAvailable");
    
    $exchangeFunds = $exchangeAmount * $exchangePrice;
    
    updateBalance($conn, $exchangeAmount, $exchangeFunds, $buyerName, 'buyer');
    updateBalance($conn, $exchangeAmount, $exchangeFunds, $sellerName, 'seller');
    
    updateOrderBook($conn, 'buy', $exchangeAmount, $bidID);
    updateOrderBook($conn, 'sell', $exchangeAmount, $askID);
    
    addToLastTrades($conn, 'mfeur', $exchangePrice, $exchangeAmount, 'buy', $buyerName);
    addToLastTrades($conn, 'mfeur', $exchangePrice, $exchangeAmount, 'sell', $sellerName);
}

function getUserData($conn, $username, $dataType){ 
    $sql = "SELECT * FROM users WHERE uid = '$username'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    if($dataType == "mf"){
        return $row['mf'];
    }else if($dataType == "mfAvailable"){
        return $row['mfAvailable'];
    }else if($dataType == "eur"){
        return $row['eur'];
    }else if($dataType == "eurAvailable"){
        return $row['eurAvailable'];
    }
}

function getBiggestBid($conn, $ticker){
    if($ticker=='mfeur'){
        $sql = "SELECT price FROM mfeurbids ORDER BY price DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['price'];
    }
}

function getSmallestAsk($conn, $ticker){
    if($ticker=='mfeur'){
        $sql = "SELECT price FROM mfeurasks ORDER BY price ASC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['price'];
    }
    
}

function getBuyAmount($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT amountRP FROM mfeurbids WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['amountRP'];
    }
    
}
function getSellAmount($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT amountRP FROM mfeurasks WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['amountRP'];
    }
}
function getBuyerName($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT username FROM mfeurbids WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['username'];
    }
}
function getSellerName($conn, $ticker, $id){
    if($ticker=='mfeur'){
        $sql = "SELECT username FROM mfeurasks WHERE id = '$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    return $row['username'];
    }
}
function getBuyOrderID($conn, $ticker){
    if($ticker=='mfeur'){
        $sql = "SELECT id FROM mfeurbids ORDER BY price DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['id'];
    }
}
function getSellOrderID($conn, $ticker){
    if($ticker=='mfeur'){
        $sql = "SELECT id FROM mfeurasks ORDER BY price ASC LIMIT 1";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        return $row['id'];
   }
}

function getMarketMaker($conn, $ticker, $buyerID, $sellerID){
    if($ticker=='mfeur'){
        $sqlAsk = "SELECT date FROM mfeurasks WHERE id = '$sellerID'";
        $resultAsk = $conn->query($sqlAsk);
        $rowAsk = mysqli_fetch_array($resultAsk);
    
        $sqlBid = "SELECT date FROM mfeurbids WHERE id = '$buyerID'";
        $resultBid = $conn->query($sqlBid);
        $rowBid = mysqli_fetch_array($resultBid);
        
         if($rowBid['date'] < $rowAsk['date']){//Bid order was created before than ask order
        return 1;
    }else if($rowBid['date'] > $rowAsk['date']){//Bid order was created before than ask order
        return 0;
    }else{  //Both orders have been sent at the same time
        echo 'Matching error. We can not determine who is maker/taker.';
    }
    }
}

function addToLastTrades($conn, $ticker, $exchangePrice, $exchangeAmount, $orderType, $username){
    $date = date('Y-m-d H:i:s a', time());
   
    if($ticker=='mfeur'){
        $sql = "INSERT INTO `mfeurtrades`(`id`, `username`, `price`, `orderType`, `amountRP`, `amountEUR`, `feeRP`, `feeEUR`, `date`) 
            VALUES (NULL,'$username','$exchangePrice','$orderType','$exchangeAmount','7','7','7','$date')";
        $result = $conn->query($sql);
    }
    
}
?>