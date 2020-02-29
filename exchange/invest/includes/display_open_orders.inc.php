<?php

function display_open_orders($conn, $market, $ticker, $username){
    if($market == 'royalty_market'){
        if($ticker == 'pgeur'){
            //Select data from database
            $sql = "SELECT * FROM open_orders WHERE username = '$username'";
            $result = $conn->query($sql);

            //Table header
            ?>
            <h2>Royalty Market</h2>
            <table style="width:100%">
                <tr>
                    <th>Ticker</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Value</th>
                    <th>Date</th>
                </tr>
            <?php
            //Table data
            while($row = mysqli_fetch_assoc($result)){
                $value = $row['amount_RP'] * $row['price'];
                echo "<tr><td>". $row['ticker'] ."</td><td>". $row['type'] ."</td><td>". $row['price'] ." €</td><td>". $row['amount_RP'] ." PG</td>
            <td>". $value ." €</td><td> ". $row['date'] ."</td></tr>";
            }

            //Close table
            ?></table><?php
        }        
    }else if($market == 'loan_market'){
        if($ticker == 'loaneur'){
            //TODO: Display My Open Orders in loan market
        }
    }    
}
?>