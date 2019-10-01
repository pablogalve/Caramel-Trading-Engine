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
            echo 'Internal error. Please, contact support with subject: Error MF002';
    }
}
?>