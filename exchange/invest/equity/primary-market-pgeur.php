<?php
    session_start();
    include '../../database.php';
    include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/display_market_data.inc.php');
    include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/create_order.inc.php');
    date_default_timezone_set('Europe/Tallinn');
?>

<!DOCTYPE html>
<html lang="en">  
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <title>Primary Market</title>        
        <meta name="title" content="web_Title">
        <meta name="description" content="web_Description">    
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="title">
            <h1>Primary market</h1> 
            <p>PG Royalties for sale</p>
        </div>
        <?php

        display_market_data($conn, 'pgeur', 'primary_market_ask');

        //Input form to buy royalties
        echo "<form action='".create_order($conn)."' method='POST'>
                I want to spend:
                <input type='number' name='amount_EUR' placeholder='100' min='10'> € <br>
                Max. Price:
                <input type='number' name='price' placeholder='1.5' min='0'> € <br>
                <input type='hidden' name='ticker' value='primary_market_pgeur'>
                <input type='hidden' name='type' value='market_buy'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <button type='submit' name='submit_buy' >INVEST</button><br>
                </form>";    
            
            //Show available funds or "not logged in" message
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $sql = "SELECT eur FROM users WHERE username='$username' LIMIT 1";
                $result = $conn->query($sql);
                $row = $result->fetch_array();
                echo "Available funds: $row[eur] €";
            }else{
                echo 'You are not logged in';
            }
        ?>

    </body>
</html>