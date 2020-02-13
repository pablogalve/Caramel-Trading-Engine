<?php
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
?>