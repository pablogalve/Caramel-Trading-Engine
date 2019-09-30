<?php
//define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'moonfund_UMjPPuqM');
//define('DB_PASSWORD', '6hWpVbdY2H6PrOwR');
//define('DB_DATABASE', 'moonfund_UMjPPuqM');
//$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
$conn = mysqli_connect("localhost", "moonfund_UMjPPuqM", "6hWpVbdY2H6PrOwR", "moonfund_UMjPPuqM");

if (!$conn) {
 die("Connection failed: ".mysql_connect_error());
}
?>