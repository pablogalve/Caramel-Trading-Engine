<?php


function updateBalance($conn, $mf_amount, $eur_amount, $username, $change)
{
    switch($change)
    {
        case "eur":
            $sql = "UPDATE users SET eur=eur+'$eur_amount' WHERE uid='$username'";
            $result = $conn->query($sql);
            break;
        case "mf":
            $sql = "UPDATE users SET mf=mf+'$eur_amount' WHERE uid='$username'";
            $result = $conn->query($sql);
            break;
        default:
            echo 'Internal error. No currency selected to update balance. Please, contact support and send them this error to fix it';
    }
}
?>