<?php
include $_SERVER['DOCUMENT_ROOT'].'/headers/header_setup.php';
include 'includes/display_open_orders.inc.php';
include '../database.php';

if(isset($_SESSION['username'])){
    ?> <h1>MY OPEN ORDERS</h1> <?php
    display_open_orders($conn, 'royalty_market', 'pgeur', $_SESSION['username']);
    display_open_orders($conn, 'loan_market', 'loaneur', $_SESSION['username']);//TODO
}
else echo 'Please login to continue.'


?>

