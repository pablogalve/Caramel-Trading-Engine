<?php
   include('dbh.php');
   session_start();
   
   $user_check = $_SESSION['username'];
   
   $ses_sql = mysqli_query($conn,"select uid from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql);
   
   $login_session = $row['uid'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
   }
?>