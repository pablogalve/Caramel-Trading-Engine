<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'demo_username');
define('DB_PASSWORD', 'demo_password');
define('DB_DATABASE', 'demo_database');
// connect to the database
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if (!$conn) {
 die("Connection failed: ".mysql_connect_error());
}

?>