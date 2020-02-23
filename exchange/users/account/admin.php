<?php
include $_SERVER['DOCUMENT_ROOT'].'/headers/header_setup.php';
include $_SERVER['DOCUMENT_ROOT'].'/database.php';
include 'admin_includes/display_form.php';
include 'admin_includes/display_admin_data.php';

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
  <?php 
  display_form($conn, "credit_deposit"); 
  display_admin_data("pending_deposits");

  display_form($conn, "credit_bonus"); 
  display_admin_data("pending_bonuses");

  display_form($conn, "confirm_withdrawal"); 
  display_admin_data("pending_withdrawals");

  display_form($conn, "mint_royalties"); 
  display_form($conn, "issue_loan");

  display_form($conn, "freeze_account");
  ?>
</div>
		
</body>
</html>