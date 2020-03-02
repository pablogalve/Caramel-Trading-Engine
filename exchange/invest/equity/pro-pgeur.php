<?php
    include $_SERVER['DOCUMENT_ROOT'].'/headers/header_setup.php';
    include '../../database.php';
    include $_SERVER['DOCUMENT_ROOT'].'/invest/includes/display_market_data.inc.php';
    include 'includes/display_form.inc.php';
    include $_SERVER['DOCUMENT_ROOT'].'/invest/includes/display_open_orders.inc.php';
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
        <?php 
            //Display visual data
            display_market_data($conn, 'pgeur', 'primary_market_ask');
            display_market_data($conn, 'pgeur', 'secondary_market_ask');
            
            //Display interactuable forms
            display_form($conn, 'create_market_order');
            display_form($conn, 'create_limit_order');
         
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
            //Display visual data   
            display_market_data($conn, 'pgeur', 'secondary_market_bid');
            display_market_data($conn, 'pgeur', 'last_trades');

            display_equity_open_orders($conn, $ticker, $username);
        ?>
    </body>
</html>