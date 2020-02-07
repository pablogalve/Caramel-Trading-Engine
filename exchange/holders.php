<!DOCTYPE html>
<html>
    <head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
    text-align: left;
}
</style>
</head>
<body>

<table style="width:100%">
  <tr>
    <th>Username</th>
    <th>MF</th>
    <th>Royalties Value(EUR)</th>
    <th>MF Available</th>
    <th>EUR</th>
    <th>EUR Available</th>
  </tr>
  
<?php 
session_start();
include 'database.php';

$sql = "SELECT * FROM users ORDER BY MF DESC"; 
$result = $conn->query($sql);

$lastPrice = getLastPrice($conn);
$lastPriceNew = (float)$lastPrice; //We transform to float to avoid a multiplication error

while($row = mysqli_fetch_assoc($result)){
    if($row['mf'] != null){
        $royaltyValue = $row['mf'] * $lastPriceNew;
        
    echo "<tr><td>". $row['uid'] ."</td><td>". $row['mf'] ."</td><td>". $royaltyValue ."</td><td>". $row['mfAvailable'] ."</td><td>". $row['eur'] ."</td><td>". $row['eurAvailable'] ."</td><tr>";
    }
}
echo '</table>';


?>
</table>
</body>
</html>

<?php 
function getLastPrice($conn){
    $sql = "SELECT price FROM mfeurtrades ORDER BY id DESC LIMIT 1"; //Get Last price to calculate royalty value
    $result = $conn->query($sql);
   
    $lastPrice = mysqli_fetch_assoc($result);
    echo 'Last Price: ' . $lastPrice['price'];
    return $lastPrice['price'];
}
?>