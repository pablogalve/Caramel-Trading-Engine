<?php
include '../dbh.php';//It connects to the database

$sql = "SELECT * FROM mfeurcandlestick ORDER BY date ASC";
$result = $conn->query($sql);
//$row = mysqli_fetch_array($result);
    
//$result=mysql_query ("SELECT date, open, high, low, close FROM mfeurcandlestick ORDER BY timestamp ASC") or die (mysql_error ());

$data = array();
$count = 0;
while ($row = mysqli_fetch_array($result))
{

  $newdate = strtotime($row['date']) * 1000; 
  $data[] = array($newdate, (float)$row['open'], (float)$row['high'], (float)$row['low'], (float)$row['close'], (float)$row['volume']);
  $count++;
}   
echo json_encode($data);
?>

