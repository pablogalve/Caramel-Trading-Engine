<?php
include 'send_loan.php';

function issue_loan($conn){
    if(isset($_POST['submit_mint'])){ 
        $username = $_SESSION['username'];
        $amount_EUR = $_POST['amount_EUR'];
        $interest_rate = $_POST['interest_rate'];
        $term = $_POST['term'];
        $date = $_POST['date'];

        newLoan($conn, $username, $amount_EUR, $interest_rate, $term, $date);
    }
}

?>