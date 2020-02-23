<?php
include $_SERVER['DOCUMENT_ROOT'].'/headers/header_setup.php';
include $_SERVER['DOCUMENT_ROOT'].'/database.php';
include 'admin_includes/create_mint.php';
include 'admin_includes/create_loan.php';
include 'admin_includes/create_transfer.php';

//We make sure that only admin can access that area
if(!isset($_SESSION['username']))header('Location: http://exchange.moonfunding.com');
else{
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    //We reject access if user is not admin or if there's an error
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc())
            if($row["role"] != 'admin')header('Location: http://exchange.moonfunding.com');
    }else header('Location: http://exchange.moonfunding.com');    
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
  <h2>Admin Panel</h2>
  <h3>WARNING! This is a restricted area!</h3>  
</div>
<div class="content">
  <h3>Mint Royalties and Sell on Primary Market</h3> 
  <p>Creates new royalties and lists them for sale at primary market. If the order is cancelled, royalties are burned out of the system again.</p>
  <p></p>
  <?php
    echo "<form action='".create_mint($conn)."' method='POST'>
      Amount:
      <input type='number' name='amount_RP'>PG<br>
      Price:
      <input type='number' name='price' step='0.01'>€<br>      
      <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>      
      <button type='submit' name='submit_mint' >Mint Royalties</button>
    </form>";    
  ?> 
  <h3>Transfers and Deposits</h3>  
  <p>Use that to credit deposits and bonuses.</p>
  <?php
    echo "<form action='".create_transfer($conn)."' method='POST'>
      Amount:
      <input type='number' name='amount_RP'>PG<br>
      Amount:
      <input type='number' name='amount_EUR' step='0.01'>€<br>    
      Reference:
      <input type='text' name='reference'><br> 
      Beneficiary:
      <input type='text' name='beneficiary'><br> 
      <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>      
      <button type='submit' name='submit_transfer' >Transfer</button>
    </form>";    
  ?>
  <h3>Withdrawals</h3>  
  <p>Accept pending Withdrawal request from investors and send them to their bank accounts.
  <?php
    //TODO: Withdrawal system
  ?>
  <h3>Issue loans to Primary Market</h3> 
  <p>Use that to create and issue new loans so that investors can buy them.</p> 
  <?php
    echo "<form action='".issue_loan($conn)."' method='POST'>
      Amount:
      <input type='number' name='amount_EUR'> €<br>      
      <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>      
      Interest Rate:
      <input type='number' name='interest_rate' step='0.01'> % <br>
      Term:
      <input type='number' name='term'> Months <br>
      <button type='submit' name='issue_loan'>Issue Loan</button>
    </form>";    
  ?>
</div>
		
</body>
</html>