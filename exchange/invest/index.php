<?php 
session_start();

if (!isset($_SESSION['username'])) {
	include '../header_main.php';
  }else{
    include '../header_loggedin.php';
  }
?>

<!DOCTYPE html>
<html>      
    <body>
        <div class="title">
            <h1>INVEST</h1> 
            <p>Select your investment between royalties and fixed-interest loans. <br>
            They are available both at primary and secondary market.</p>
        </div>
        <div class="line"></div>
        <div class="options">
            <ul>
                <li><a href="#">My investments</a></li>
                <li><a href="equity/pgeur">Equity</a></li>
                <li><a href="loans/market">Fixed-interest loans</a></li>
            </ul>
        </div>
            
        </div>
    </body>