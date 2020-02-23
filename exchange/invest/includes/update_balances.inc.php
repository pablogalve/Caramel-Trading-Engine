<?php

function updateBalance($conn, $amount_RP, $amount_EUR, $username, $currency)
{
    switch($currency){
        case "eur":
            $sql = "UPDATE users SET eur=eur+'$amount_EUR' WHERE username='$username'";
            $result = $conn->query($sql);
            break;
        case "pg":
            $sql = "UPDATE users SET pg=pg+'$amount_RP' WHERE username='$username'";
            $result = $conn->query($sql);
            break;
        default:
        //Error. This should not happen.
        break;
    }
}
?>