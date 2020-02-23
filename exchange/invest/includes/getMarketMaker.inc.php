<?php
function getMarketMaker($conn, $ticker, $buyerID, $sellerID){
    //Returns the market market: User who created the order earlier
    if($ticker=='pgeur'){
        $sqlAsk = "SELECT date FROM secondary_market_pgeur_ask WHERE id = '$sellerID'";
        $resultAsk = $conn->query($sqlAsk);
        $rowAsk = mysqli_fetch_array($resultAsk);
    
        $sqlBid = "SELECT date FROM secondary_market_pgeur_bid WHERE id = '$buyerID'";
        $resultBid = $conn->query($sqlBid);
        $rowBid = mysqli_fetch_array($resultBid);
        
        if($rowBid['date'] < $rowAsk['date'])return 'buyer';
        else if($rowBid['date'] > $rowAsk['date'])return 'seller';    
    }
}
?>