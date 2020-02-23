<?php
include 'send_transfer.php';

function create_transfer($conn){
    if(isset($_POST['submit_transfer'])){ 
        $username = $_SESSION['username'];
        $amount_RP = $_POST['amount_RP'];
        $amount_EUR = $_POST['amount_EUR'];
        $date = $_POST['date'];

        newLimitSell($conn, $username, $amount_EUR, $amount_RP, $date);
    }
}

?>