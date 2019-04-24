<?php

function buy($conn){
    if(isset($_POST['submitbuymfeur'])){
            $amountRP = $_POST['amountRP'];  //Royalty position amount
            $price = $_POST['price'];
            $username = $_POST['username'];
            $type = $_POST['type'];  //Buy or sell
            $ticker = $_POST['ticker'];  //mfeur, mfbtc, mfusd, etc.
            $date = $_POST['date'];  
             
            $amountEUR = $price*$amountRP;
            newOrder($conn, $type, $ticker, $price, $amountRP, $amountEUR, $username, $date);
    }
}
    
    function sell($conn){
        if(isset($_POST['submitsellmfeur'])){
            $amountRP = $_POST['amountRP'];  //Royalty position amount
            $price = $_POST['price'];
            $username = $_POST['username'];
            $type = $_POST['type'];  //Buy or sell
            $ticker = $_POST['ticker'];  //mfeur, mfbtc, mfusd, etc.
            $date = $_POST['date'];  
        
            $amountEUR = $price*$amountRP;
            newOrder($conn, $type, $ticker, $price, $amountRP, $amountEUR, $username, $date);
    } 
}


?>