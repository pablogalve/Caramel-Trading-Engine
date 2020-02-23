<?php

//Mint Royalties and create a sell order on primary market
function newLimitSell($conn, $username, $price, $amount_RP, $date){
    $sql = "INSERT INTO primary_market_pgeur_ask (username, price, amount_RP, date) 
            VALUES ('$username', '$price', '$amount_RP', '$date')";
    $result = $conn->query($sql); 
    if($result)echo 'Mint sent successfully!';
    else die("Connection failed: " . $conn->connect_error);  
}
?>