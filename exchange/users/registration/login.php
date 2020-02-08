<?php 
session_start();

include('server.php');

//If already logged in, then redirect to "my account" panel
if (isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You are already logged in";
  	header('location: http://exchange.moonfunding.com/users/account/');
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Pantera Group</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>