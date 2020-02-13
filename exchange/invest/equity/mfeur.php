<?php
    //session_start();
    //include '../header.php';
    include 'includes/order_functions.inc.php';
    include '../database.php';
    include 'includes/display_market_data.inc.php';
    include 'includes/buy_or_sell.inc.php';
    date_default_timezone_set('Europe/Tallinn');
    include 'mfeurcandlestick.htm';
    if (isset($_SESSION['id'])) {
  echo $_SESSION['id'];
 }else{
     echo "You are not logged in!";
 }
?>
<html>
<head>
<title> Market </title>
</head>
<body>
<h2>This is the marketplace for MF royalties!</h2>
<h3>You can buy/sell them at real-time with euros!</h3>
<p>To see the users, visit http://exchange.moonfunding.com/holders</p>
<p>Disclaimer: User's balances are wrong, we're still working on it</p>
<?php
echo "<form action='".buy($conn)."' method='POST'> 
    <input type='text' name='price' placeholder='Price'><br>
        <input type='text' name='amountRP' placeholder='Amount'><br>
        <input type='text' name='username' placeholder='Username'><br>
        <input type='hidden' name='ticker' value='mfeur'>
        <input type='hidden' name='type' value='buy'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        
        <button type='submit' name='submitbuymfeur' >BUY</button>
    </form>";
  
echo "<form action='".sell($conn)."' method='POST'> 
    <input type='text' name='price' placeholder='Price'><br>
        <input type='text' name='amountRP' placeholder='Amount'><br>
        <input type='text' name='username' placeholder='Username'><br>
        <input type='hidden' name='ticker' value='mfeur'>
        <input type='hidden' name='type' value='sell'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        
        <button type='submit' name='submitsellmfeur'>SELL</button>
    </form>";
    
display_market_data($conn, 'mfeur', 'bid');
display_market_data($conn, 'mfeur', 'ask');
display_market_data($conn, 'mfeur', 'lastTrades');
?>

</body>
</html>