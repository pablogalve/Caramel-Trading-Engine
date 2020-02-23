<?php
include 'send_deposit.php';

function create_deposit($conn){
    if(isset($_POST['submit_deposit'])){ 
        $username = $_POST['beneficiary'];
        $amount_EUR = $_POST['amount_EUR'];
        $status = $_POST['status'];
        $reference = $_POST['reference'];
        $beneficiary = $_POST['beneficiary'];
        $date = $_POST['date'];

        newDeposit($conn, $username, $amount_EUR, $status, $date);
    }
}

?>