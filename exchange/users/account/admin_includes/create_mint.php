<?php
include 'send_mint.php';

function create_mint($conn){
    if(isset($_POST['submit_mint'])){ 
        $username = $_SESSION['username'];
        $amount_RP = $_POST['amount_RP'];
        $price = $_POST['price'];
        $date = $_POST['date'];

        newLimitSell($conn, $username, $price, $amount_RP, $date);
    }
}

?>