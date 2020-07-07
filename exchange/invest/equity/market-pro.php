<?php
    include $_SERVER['DOCUMENT_ROOT'].'/headers/header_setup.php';
    include '../../database.php';
    include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/display_market_data.inc.php');
    include 'includes/display_form.inc.php';
    include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/display_open_orders.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-pro.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Caramel Capital Market</title>
</head>
<body>
    <div class="cards">
        <div class="card candlestick_graph">
            <?php 
                //Display candlestick chart
                include 'charts/royalty_chart.html';
            ?>
        </div>
        <div class="card orderbook">    
            <?php      
            display_market_data($conn, 'pgeur', 'orderbook_styled');        
        ?>
        </div>
        <div class="card new_order"><h3>Start Trading</h3>
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
                ?>
                <a href="https://www.pablogalve.com/users/registration/login" class="button">Login</a>
                <a href="https://www.pablogalve.com/users/registration/register" class="button">Register</a>
                <h3>Welcome to Caramel Capital</h3>
                <p>We provide access to investments for you through:</p>
                <ul>
                    <li>Volume-based fee structure</li>
                    <li>High performance matching engine</li>
                </ul>
                <?php
            }
            ?>
        </div>
        <div class="card market_depth_graph">
            <?php 
                //Display market depth chart
                include 'charts/market_depth.html';
            ?>
        </div>
        <div class="card last_trades">
        <?php
            //Display visual data  
            display_market_data($conn, 'pgeur', 'last_trades');
        ?>
        </div>
        <div class="card open_orders"><h3>My Open Orders</h3>
        <?php
            //Display open orders
            if (isset($_SESSION['username'])) {
                display_open_orders($conn, 'royalty_market', 'pgeur', $username);                
            }else{
                ?>
                <a href="https://www.pablogalve.com/users/registration/login" class="button">Login</a>
                <a href="https://www.pablogalve.com/users/registration/register" class="button">Register</a>
                <h3>Welcome to Caramel Capital</h3>
                <p>We provide access to investments for you through:</p>
                <ul>
                    <li>Volume-based fee structure</li>
                    <li>High performance matching engine</li>
                </ul>
                <?php
            }            
        ?></div>
    </div>
</div>
</body>
</html>