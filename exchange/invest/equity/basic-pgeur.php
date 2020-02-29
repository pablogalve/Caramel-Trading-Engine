<?php
    include $_SERVER['DOCUMENT_ROOT'].'/headers/header_setup.php';
    include '../../database.php';
    include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/display_market_data.inc.php');
    include 'includes/display_form.inc.php';
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
            //Display interactuable forms
            display_form($conn, 'create_limit_buy');
            display_form($conn, 'create_limit_sell');         
        ?>
    </body>
</html>