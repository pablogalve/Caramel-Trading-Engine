<?php

function display_open_orders($conn, $market, $ticker, $username){
    ?>
  <html>
    <head>
        <style>
            .sell_style{
                color: red;
            }
            .buy_style{
                color: green;
            }
        </style>
    </head>
  </html>
  
  <?php
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
                //Set style (colors)
                if($row['order_type'] == 'buy')$style = "buy_style";
                else if($row['order_type'] == 'sell')$style = "sell_style";

                //We calculate value and date (DD:MM:YYYY)
                $value = $row['amount_RP'] * $row['price'];
                $value = round($value, 2, PHP_ROUND_HALF_EVEN);
                $date = $row['date'];
                $date = strtotime($date);

                //Show open orders from database
                echo "<tr>
                <td>". $row['ticker'] ."</td>
                <td><div class='$style'>". $row['order_type'] ."</div></td>
                <td>". $row['price'] ." €</td>
                <td>". $row['amount_RP'] ." CC</td>
                <td>". $value ." €</td>
                <td>". date('d/m/Y', $date) ."</td></tr>";
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