<?php

//Mint Royalties and create a sell order on primary market
function newDeposit($conn, $username, $amount_EUR, $status, $date){
    //Add deposit to "deposits" table
    $sql = "INSERT INTO deposits (username, amount_EUR, status, date) 
            VALUES ('$username', '$amount_EUR', '$status', '$date')";
    $result = $conn->query($sql); 
    if($result)echo 'Deposit added to <deposits> successfully! (1/2) <br>';
    else die("Connection failed: " . $conn->connect_error);  

    //Add deposit amount to "users" table
    if($status == 'confirmed'){
        $sql = "UPDATE users SET eur=eur+'$amount_EUR' WHERE username='$username'";
        $result = $conn->query($sql); 
        if($result)echo 'Deposit credited to virtual wallet successfully! (2/2) <br>';
        else die("Connection failed: " . $conn->connect_error);
    }else if($status == 'rejected')
        echo 'Deposit NOT credit to virtual wallet. It was rejected (2/2) <br>';
    
}
?>