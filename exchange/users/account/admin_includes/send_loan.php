<?php

//Mint Royalties and create a sell order on primary market
function newLoan($conn, $username, $amount_EUR, $interest_rate, $term, $date){
    $sql = "INSERT INTO primary_market_loaneur_ask (username, interest_rate, amount_EUR, term_months, date_created) 
            VALUES ('$username', '$interest_rate', '$amount_EUR', '$term', '$date')";
    $result = $conn->query($sql); 
    if($result)echo 'Loan issued successfully!';
    else die("Connection failed: " . $conn->connect_error);  
}
?>