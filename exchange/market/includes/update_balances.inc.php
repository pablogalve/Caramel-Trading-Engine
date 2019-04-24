<?php

function updateBalance($conn, $amount, $eur, $username, $who, $feeEUR, $feeRP){ //$who='buyer' or 'seller'. $Username is the person that buys or sells
    if($who == 'buyer'){ //Remove eur and add amount & amountAvailable
        $sql = "UPDATE users SET mf=mf+'$amount',mfAvailable=mfAvailable+'$amount',eur=eur-'$eur'-'$feeEUR' WHERE uid='$username'";
        $result = $conn->query($sql);
        
    }else if($who == 'seller'){ //Remove amount and add eur & eurAvailable
        $sql = "UPDATE users SET mf=mf-'$amount'-'$feeRP',eurAvailable=eurAvailable+'$eur',eur=eur+'$eur' WHERE uid='$username'";
        $result = $conn->query($sql);
    }
}
?>