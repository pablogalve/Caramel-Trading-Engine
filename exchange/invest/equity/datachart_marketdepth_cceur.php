<?php
include '../../database.php';//It connects to the database

$sql = "SELECT * FROM secondary_market_pgeur_ask ORDER BY price ASC";
$result = $conn->query($sql);
$sql_bid = "SELECT * FROM secondary_market_pgeur_bid ORDER BY price ASC";
$result_bid = $conn->query($sql_bid);

$data = array();
$count = 0;

while ($row = mysqli_fetch_array($result))
{
  $data['asks'][] = array(
      (float)$row['price'], 
      (float)$row['amount_RP']);  
  $count++;
}   

$count = 0;
while ($row = mysqli_fetch_array($result_bid))
{
  $data['bids'][] = array(
      (float)$row['price'], 
      (float)$row['amount_RP']);
  $count++;
} 
echo json_encode($data);
?>

