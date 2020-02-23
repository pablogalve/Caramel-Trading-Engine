<?php
    include $_SERVER['DOCUMENT_ROOT'].'/headers/header_setup.php';
    include '../../database.php';
    include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/display_market_data.inc.php');
    include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/create_order.inc.php');
    date_default_timezone_set('Europe/Tallinn');
?>

<!DOCTYPE html>
<html lang="en">  
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <title>Market</title>        
        <meta name="title" content="web_Title">
        <meta name="description" content="web_Description">    
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>Primary Market Asks</h1> 
        <?php display_market_data($conn, 'pgeur', 'primary_market_ask');?>
        <h1>Secondary Market Asks</h1> 
        <?php display_market_data($conn, 'pgeur', 'secondary_market_ask');?>

        <h2>Instant order (Not working yet)</h2>
        <?php
        //Input form to buy royalties
        echo "<form action='".create_market_order($conn)."' method='POST'>
                I want to spend:
                <input type='number' name='amount_EUR' step='0.0001' min='10'> € <br>
                <input type='hidden' name='ticker' value='pgeur'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <button type='submit' name='submit_buy' >MARKET BUY</button>
                <button type='submit' name='submit_sell' >MARKET SELL</button><br>
                </form>";    
        ?><h2>Limit order</h2><?php
        echo "<form action='".create_limit_order($conn)."' method='POST'>
                Amount:
                <input type='number' name='amount_RP' step='0.0001' min='10.0000'> PG <br>
                Price:
                <input type='number' name='price' step='0.01' min='0'> € <br>
                <input type='hidden' name='ticker' value='pgeur'>
                <input type='hidden' name='type' value='limit'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <button type='submit' name='submit_buy' >LIMIT BUY</button>
                <button type='submit' name='submit_sell' >LIMIT SELL</button><br>
                </form>";  
            //Show available funds or "not logged in" message
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                $sql = "SELECT eur,pg FROM users WHERE username='$username' LIMIT 1";
                $result = $conn->query($sql);
                $row = $result->fetch_array();
                echo "Available funds: $row[eur] € <br>";
                echo "Available royalties: $row[pg] PG <br>";
            }else{
                echo 'You are not logged in';
            }
        ?>
        <h1>Secondary Market Bids</h1> 
        <?php
        display_market_data($conn, 'pgeur', 'secondary_market_bid');
        ?>
        <h1>Last Trades</h1> 
        <?php
        display_market_data($conn, 'pgeur', 'last_trades');
        ?>
    </body>
</html>