<?php

function display_equity_open_orders($conn, $ticker, $username){
    if($username == 'all'){
        //To display all open orders
        $sql = "SELECT * FROM open_orders";
        $result = $conn->query($sql);
    }else{
        //For a specific user
        $sql = "SELECT * FROM open_orders WHERE username = '$username'";
        $result = $conn->query($sql);
    }

    //Table header
    ?>
    <h1>My Open Orders</h1>
    <table style="width:100%">
        <tr>
            <th>Ticker</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Value</th>
            <th>Date</th>
        </tr>
    <?php
    //Table data
    while($row = mysqli_fetch_assoc($result)){
        $value = $row['amount_RP'] * $row['price'];
        echo "<tr><td>". $row['ticker'] ."</td><td>". $row['price'] ." €</td><td>". $row['amount_RP'] ." PG</td>
      <td>". $value ." €</td><td> ". $row['date'] ."</td></tr>";
    }

    //Close table
    ?></table><?php
}
?>