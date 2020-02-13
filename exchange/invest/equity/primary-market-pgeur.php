<?php
    session_start();
    include '../../database.php';
    include 'includes/display_market_data.inc.php';
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
        </div>
        <! –– PHP start ––>
        <?php

        display_market_data($conn, 'mfeur', 'bid');
        display_market_data($conn, 'mfeur', 'ask');
        display_market_data($conn, 'mfeur', 'lastTrades');
        ?>

    </body>
</html>