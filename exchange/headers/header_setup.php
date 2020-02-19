<?php
session_start();

if (!isset($_SESSION['username'])) include ('header_main.php');
else include 'header_loggedin.php';  
?>