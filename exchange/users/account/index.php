<?php
include '../../headers/header_setup.php';
include '../../database.php';

if (!isset($_SESSION['username'])){
    //If user is not logged in, we redirect to login page
    header('location: https://www.pablogalve.com/caramel_capital/users/registration/login');
}else{
    //If user is logged in, we get their data from database
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<title>My Account</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  div p.left, div p.right { display:  inline-block; width: 50%; }

  p.left { float: left; }

  p.right {float: right; text-align: right; }
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="../../images/pablogalve.PNG" style="width:100%" alt="Profile Picture">
          <div class="w3-display-bottomleft w3-container w3-text-black">
          </div>
        </div>              
        <div class="w3-container">        
          <?php
          //First and Last Name
          while($row = mysqli_fetch_array($result)){
            echo "<td><h2>" . $row['role'] . "</h2></td>";          
          ?>           
          <?php
            //Investor ID
            echo '<div><p class="left"><i class="fa fa-list-ol fa-fw w3-margin-right w3-large w3-text-teal"></i>Investor ID </p>
            <p class="right">' . $row['role'] . '</p></div>';
            //Username
            echo '<div><p class="left"><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>Username </p><p class="right">' . $row['username'] . '</p></div>';
            //Address
            echo '<div><p class="left"><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Address </p><p class="right">' . $row['role'] . '</p></div>';
            //City
            echo '<div><p class="left"><i class="fa fa-map-marker fa-fw w3-margin-right w3-large w3-text-teal"></i>City </p><p class="right">' . $row['role'] . '</p></div>';
            //Postal Code
            echo '<div><p class="left"><i class="fa fa-plane fa-fw w3-margin-right w3-large w3-text-teal"></i>Postal Code </p><p class="right">' . $row['role'] . '</p></div>';
            //Email
            echo '<div><p class="left"><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>Email </p><p class="right">' . $row['email'] . '</p></div>';
            //Phone Number
            echo '<div><p class="left"><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>Phone </p><p class="right">' . $row['role'] . '</p></div>';
            //Language
            echo '<div><p class="left"><i class="fa fa-language fa-fw w3-margin-right w3-large w3-text-teal"></i>Preferred language </p><p class="right">' . $row['role'] . '</p></div>';
            //Role
            echo '<div><p class="left"><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Role </p><p class="right">' . $row['role'] . '</p></div>';  
          ?>          
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Financial Information</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Virtual Wallet</b></h5>
          <h6 class="w3-text-teal">Balances</h6>
          <?php            
            //Eur Balance
            echo '<div><p class="left"><i class="fa fa-eur fa-fw w3-margin-right w3-large w3-text-teal"></i>EUR Balance</p><p class="right">' . $row['eur'] . ' €</p></div>';
            //CC Balance
            echo '<div><p class="left"><i class="fa fa-pie-chart fa-fw w3-margin-right w3-large w3-text-teal"></i>Royalty Balance</p><p class="right">' . $row['pg'] . ' Royalties</p></div>';
            //On loans
            echo '<div><p class="left"><i class="fa fa-signal fa-fw w3-margin-right w3-large w3-text-teal"></i>On loans </p><p class="right">' . $row['role'] . '</p></div>';

            echo '<h6 class="w3-text-teal">Open Orders</h6>';

            //Open Orders EUR
            echo '<div><p class="left"><i class="fa fa-eur fa-fw w3-margin-right w3-large w3-text-teal"></i>In Orders (EUR) </p><p class="right">' . $row['role'] . ' €</p></div>';
            //Open Orders CC
            echo '<div><p class="left"><i class="fa fa-pie-chart fa-fw w3-margin-right w3-large w3-text-teal"></i>In Orders (Royalties) </p><p class="right">' . $row['role'] . ' Royalties</p></div>';
          ?>   
          <hr>
        </div>        
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Documents</h2>
        <h5 class="w3-opacity"><b>Virtual Wallet</b></h5>
          <h6 class="w3-text-teal">Balances</h6>
          <?php            
            //Document Type
            echo '<div><p class="left"><i class="fa fa-id-card-o fa-fw w3-margin-right w3-large w3-text-teal"></i>Document Type </p><p class="right">' . $row['role'] . '</p></div>';
            //Document Number
            echo '<div><p class="left"><i class="fa fa-id-badge fa-fw w3-margin-right w3-large w3-text-teal"></i>Document Number </p><p class="right">' . $row['role'] . '</p></div>';
            //Expiration Date
            echo '<div><p class="left"><i class="fa fa-calendar fa-fw w3-margin-right w3-large w3-text-teal"></i>Expiration Date </p><p class="right">' . $row['role'] . '</p></div>';

            //Country
            echo '<div><p class="left"><i class="fa fa-globe fa-fw w3-margin-right w3-large w3-text-teal"></i>Country</p><p class="right">' . $row['role'] . '</p></div>';
            //Personal Number
            echo '<div><p class="left"><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>Personal Number </p><p class="right">' . $row['role'] . '</p></div>';
            }
          ?>   
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Copyright 2020 - Caramel Capital.</p>
  <p>Powered by <a href="https://www.pablogalve.com" target="_blank">Caramel Capital</a></p>
</footer>

</body>
</html>
