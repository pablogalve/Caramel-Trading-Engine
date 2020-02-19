<?php

function updateBalance($conn, $amount_PG, $amount_EUR, $username, $change)
{
    switch($change)
    {
        case "eur":
            $sql = "UPDATE users SET eur=eur+'$amount_EUR' WHERE username='$username'";
            $result = $conn->query($sql);
            break;
        case "pg":
            $sql = "UPDATE users SET pg=pg+'$amount_PG' WHERE username='$username'";
            $result = $conn->query($sql);
            break;
        default:
            echo 'Internal error';
    }
}
?>