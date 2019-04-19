<?php

include '../dbh.php';
date_default_timezone_set('Europe/Tallinn');

function checkMatch($conn){
    $bid = getBiggestBid($conn); 
    $ask = getSmallestAsk($conn); 
    
    if($bid >= $ask){
        $MarketMaker = getMarketMaker($conn); //Who is the market maker and who is the taker?
        $buyAmount = getBuyAmount($conn); //Amount that the biggest bid has available
        $sellAmount = getSellAmount($conn); //Amount that the smallest ask has available
        
        if($buyAmount <= $sellAmount){ //Compare amounts listed by bid and ask and exchange the smallest
            $exchangeAmount = $buyAmount;
        }else if($sellAmount < $buyAmount){
            $exchangeAmount = $sellAmount;
        }
        
        if($MarketMaker == 1){  // 1) Maker=buyer. Taker=seller
            $exchangePrice= $bid;
            //$exchangeFunds= 1;
            
            exchange($conn, $exchangePrice, $exchangeAmount);
            
        }else if($MarketMaker==0){  // 0) Maker=seller. Taker=buyer
            $exchangePrice= $ask;
            //$exchangeFunds= 1; 
            
            exchange($conn, $exchangePrice, $exchangeAmount);
        }  
    }
}
function exchange($conn, $exchangePrice, $exchangeAmount){
    //Now let's get buyer data from user's database to proceed to exchange
    $buyerName = getBuyerName($conn); //Username of the buyer
    $bidID = getBuyOrderID($conn);
    
    $bidmf = getUserData($conn, $buyerName, "mf");
    $bidmfAvailable = getUserData($conn, $buyerName, "mfAvailable");
    $bideur = getUserData($conn, $buyerName, "eur");
    $bideurAvailable = getUserData($conn, $buyerName, "eurAvailable");
    
    //Now let's get data from the seller user user
    $sellerName= getSellerName($conn); //USername of the seller
    $askID = getSellOrderID($conn);
    
    $askmf = getUserData($conn, $sellerName, "mf");
    $askmfAvailable = getUserData($conn, $sellerName, "mfAvailable");
    $askeur = getUserData($conn, $sellerName, "eur");
    $askeurAvailable = getUserData($conn, $sellerName, "eurAvailable");
    
    $exchangeFunds = $exchangeAmount * $exchangePrice;
    
    addToLastTrades($conn, $exchangePrice, $exchangeAmount, 'buy', $buyerName);
    addToLastTrades($conn, $exchangePrice, $exchangeAmount, 'sell', $sellerName);
    
    updateBalance($conn, $exchangeAmount, $exchangeFunds, $buyerName, 'buyer');
    updateBalance($conn, $exchangeAmount, $exchangeFunds, $sellerName, 'seller');
    
    updateOrderBook($conn, 'buy', $exchangeAmount, $bidID);
    updateOrderBook($conn, 'sell', $exchangeAmount, $askID);
    
    //Check for another match, just in case there were more than one match at once
    //checkMatch($conn); //It gives errors
}
function updateBalance($conn, $amount, $eur, $username, $who){ //$who='buyer' or 'seller'. $Username is the person that buys or sells
    if($who == 'buyer'){ //Quitamos eur y a単adimos amount y amountAvailable
        $sql = "UPDATE users SET mf=mf+'$amount',mfAvailable=mfAvailable+'$amount',eur=eur-'$eur' WHERE uid='$username'";
        $result = $conn->query($sql);
        
    }else if($who == 'seller'){ //Quitamos amount y a単adimos eur y eurAvailable
        $sql = "UPDATE users SET mf=mf-'$amount',eurAvailable=eurAvailable+'$eur',eur=eur+'$eur' WHERE uid='$username'";
        $result = $conn->query($sql);
    }
}
function deleteOrder($conn, $orderType, $id){
    if($orderType=='buy'){
        $sql = "DELETE FROM mfeurbids WHERE id='$id'";
        $result = $conn->query($sql);
    }else if($orderType=='sell'){
        $sql = "DELETE FROM mfeurasks WHERE id='$id'";
        $result = $conn->query($sql);
    }
}
function updateOrderBook($conn, $orderType, $amount, $id){  //We use to update a partial filled order
    if($orderType=='buy'){
        $sql = "UPDATE mfeurbids SET amountRP=amountRP-'$amount' WHERE id='$id'";   
        $result = $conn->query($sql);
        
        //Check if amount is 0 or less. If true, it deletes the order
        $sql2 = "SELECT * FROM mfeurbids WHERE id='$id'";
        $result2 = $conn->query($sql2);
        while($row = mysqli_fetch_assoc($result2)){
            if($row['amountRP']<=0){
                deleteOrder($conn, 'buy', $id);
            }
        }
    }else if($orderType=='sell'){
        $sql = "UPDATE mfeurasks SET amountRP=amountRP-'$amount' WHERE id='$id'";   
        $result = $conn->query($sql);
        
        //Check if amount is 0 or less. If true, it deletes the order
        $sql2 = "SELECT * FROM mfeurasks WHERE id='$id'";
        $result2 = $conn->query($sql2);
        while($row = mysqli_fetch_assoc($result2)){
            if($row['amountRP']<=0){
                deleteOrder($conn, 'sell', $id);
            }
        }
    }
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

function getBiggestBid($conn){
    
    $sql = "SELECT price FROM mfeurbids ORDER BY price DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    return $row['price'];
}

function getSmallestAsk($conn){
    $sql = "SELECT price FROM mfeurasks ORDER BY price ASC LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    return $row['price'];
}

function getBuyAmount($conn){
    $sql = "SELECT amountRP FROM mfeurbids ORDER BY price DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    return $row['amountRP'];
}
function getSellAmount($conn){
    $sql = "SELECT amountRP FROM mfeurasks ORDER BY price ASC LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    return $row['amountRP'];
}
function getBuyerName($conn){
    $sql = "SELECT username FROM mfeurbids ORDER BY price DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    return $row['username'];
}
function getSellerName($conn){
    $sql = "SELECT username FROM mfeurasks ORDER BY price ASC LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    return $row['username'];
}
function getBuyOrderID($conn){
    $sql = "SELECT id FROM mfeurbids ORDER BY price DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    return $row['id'];
}
function getSellOrderID($conn){
    $sql = "SELECT id FROM mfeurbids ORDER BY price ASC LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    return $row['id'];
}

function getMarketMaker($conn){
    $sqlAsk = "SELECT date FROM mfeurasks ORDER BY price ASC LIMIT 1";
    $resultAsk = $conn->query($sqlAsk);
    $rowAsk = mysqli_fetch_array($resultAsk);
    
    $sqlBid = "SELECT date FROM mfeurbids ORDER BY price DESC LIMIT 1";
    $resultBid = $conn->query($sqlBid);
    $rowBid = mysqli_fetch_array($resultBid);
   
    if($rowBid['date'] < $rowAsk['date']){//Bid order was created before than ask order
        return 1;
    }else if($rowBid['date'] > $rowAsk['date']){//Bid order was created before than ask order
        return 0;
    }else{  //Both orders have been sent at the same time
        echo 'Matching error. We can not determine who is maker/taker.';
        echo 'Tips: 1) Cancel the order and place it again';
        echo '2) Just wait until someone accepts your bid/ask';
        echo '3) If this does not work. Contact an administrator';
    }
}

function addToLastTrades($conn, $exchangePrice, $exchangeAmount, $orderType, $username){
    $date = date('Y-m-d H:i:s a', time());
    
    $sql = "INSERT INTO `mfeurtrades`(`id`, `username`, `price`, `orderType`, `amountRP`, `amountEUR`, `feeRP`, `feeEUR`, `date`) 
    VALUES (NULL,'$username','$exchangePrice','$orderType','$exchangeAmount','7','7','7','$date')";
    $result = $conn->query($sql);
}
?>