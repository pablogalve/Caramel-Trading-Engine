<?php
    include $_SERVER['DOCUMENT_ROOT'].'/headers/header_setup.php';
    include '../../database.php';
    include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/display_market_data.inc.php');
    include 'includes/display_form.inc.php';
    include 'includes/display_open_orders.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-pro.css">
    <title>Caramel Capital Market</title>
</head>
<body>
    <div class="cards">
        <div class="card">CANDLESTICK GRAPH</div>
        <div class="card">ORDER BOOK
        <?php 
            //Display visual data
            display_market_data($conn, 'pgeur', 'secondary_market_ask');
            echo '<br> PRICE: 1.03 EUR (this is plain text)';
            display_market_data($conn, 'pgeur', 'secondary_market_bid');
        ?>
        </div>
        <div class="card">TRADING: BUY & SELL
            <?php

            //Show available funds or "not logged in" message
            if (isset($_SESSION['username'])) {
                //Display interactuable forms
                display_form($conn, 'create_limit_order');                    

                $username = $_SESSION['username'];
                $sql = "SELECT eur,pg FROM users WHERE username='$username' LIMIT 1";
                $result = $conn->query($sql);
                $row = $result->fetch_array();
                echo "Available funds: $row[eur] € <br>";
                echo "Available royalties: $row[pg] PG <br>";
            }else{                
                echo '<br> You are not logged in';
            }
            ?>
        </div>
        <div class="card">MARKET DEPTH
        </div>
        <div class="card">TRADE HISTORY
        <?php
            //Display visual data  
            display_market_data($conn, 'pgeur', 'last_trades');
        ?>
        </div>
        <div class="card">MY OPEN ORDERS
        <?php
            //Display open orders
            if (isset($_SESSION['username'])) {
                display_equity_open_orders($conn, $ticker, $username);
            }else{
                echo '<br> You are not logged in';
            }            
        ?></div>
    </div>
</body>
</html>