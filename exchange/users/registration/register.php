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
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
	  <h2>Register</h2>
	  <h3>Demo Account with virtual money</h3>
	  <p>Username: test1</p>
	  <p>Password: test1</p>
	  <p>You can go to "login page" and use those login details</p>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>