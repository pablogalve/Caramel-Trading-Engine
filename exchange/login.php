<?php 
session_start();
include 'dbh.php';

if (isset($_SESSION['username'])) {
      echo "You are already logged in!";
 }else{
    echo "<form action='includes/login.inc.php' method='POST'>
        <input type='text' name='username' placeholder='Username'><br>
        <input type='password' name='password' placeholder='Password'><br>
        <button type='submit' name='submitLogin'>Login</button>
    </form>";
 }
?>
