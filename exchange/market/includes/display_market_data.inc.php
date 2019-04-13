<?php
function display_market_data($conn, $ticker, $type){  //$type= bid, ask or lastTrades
    if($ticker == 'mfeur'){
        if($type == 'lastTrades'){
            
    ?>
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
                <th>Amount(MF)</th>
                <th>Price(EUR)</th>
              </tr>
            
            <?php

            $sql = "SELECT * FROM mfeurtrades ORDER BY price DESC";
            $result = $conn->query($sql);
            echo "<br><br><br> Last Trades <br>";
            
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>". $row['username'] ."</td><td>". $row['amountRP'] ."</td><td>". $row['price'] ."</td></tr>";
            }
            echo '</table>';
            ?>
            </table>
            </body>
            </html>
            <?php
        }else if($type == 'bid'){
            ?>
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
                <th>Amount(MF)</th>
                <th>Price(EUR)</th>
              </tr>
            
            <?php

            $sql = "SELECT * FROM mfeurbids ORDER BY price DESC";
            $result = $conn->query($sql);
            echo "<br><br><br> Buy Orders <br>";
            
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>". $row['username'] ."</td><td>". $row['amountRP'] ."</td><td>". $row['price'] ."</td></tr>";
            }
            echo '</table>';
            ?>
            </table>
            </body>
            </html>
            <?php
        }else if($type == 'ask'){
            ?>
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
                <th>Amount(MF)</th>
                <th>Price(EUR)</th>
              </tr>
            
            <?php

            $sql = "SELECT * FROM mfeurasks ORDER BY price DESC";
            $result = $conn->query($sql);
            echo "<br><br><br> Sell Orders <br>";
            
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>". $row['username'] ."</td><td>". $row['amountRP'] ."</td><td>". $row['price'] ."</td></tr>";
            }
            echo '</table>';
            ?>
            </table>
            </body>
            </html>
            <?php
        }
    }
}