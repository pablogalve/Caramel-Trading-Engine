<?php
    session_start();
    include '../../database.php';
    include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/display_market_data.inc.php');
    date_default_timezone_set('Europe/Tallinn');
?>

<!DOCTYPE html>
<html lang="en">  
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <title>Pantera Group</title>
        
        <meta name="title" content="web_Title">
        <meta name="description" content="web_Description">    
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        
    </head>
    <body>
        <div class="title">
            <h1>Loans - Primary Market</h1> 
            <p>Invest in fixed-interest loans.</p>
        </div>
        
        <?php
            display_market_data($conn, 'loaneur', 'primary_market_ask');
            
        ?>
            <h2>Invest panel</h2>
        <?php
            //Input form to buy loans
            echo "
                I want to spend:
                <input type='number' name='amount_EUR' placeholder='10' min='10' max='99999'> € <br>
                Min. YTM:
                <input type='number' name='min_interest_rate' placeholder='1.5' min='0' max='99'> % <br>
                Min. term:
                <input type='number' name='min_term' placeholder='6' min='0' max='120'> months<br>
                Max. term:
                <input type='number' name='max_term' placeholder='12' min='0' max='120'> months<br>
                Invest only on:
                <select>
                    <option value = 'primary'>Primary Market</option>
                    <option value = 'secondary'>Secondary Market</option>
                    <option value = 'both'>Both markets</option>
                </select><br>
                <button type='submit' name='submit_buy_loaneur' >INVEST</button><br>
                ";    
            
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
        <div class="title">
            <h1>Loans - Secondary Market</h1> 
            <p>Buy fixed-interest loans from other investors who want to sell their position.</p>
        </div>
        
        <?php
            display_market_data($conn, 'loaneur', 'secondary_market_ask');   
        ?>
    </body>
</html>