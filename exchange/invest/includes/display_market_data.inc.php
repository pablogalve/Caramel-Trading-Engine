<?php
function display_market_data($conn, $ticker, $type){  //$type= bid, ask or lastTrades
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
  
  <?php
  if($ticker == 'loaneur'){
    ?>
      <table style="width:100%">
        <tr>
          <th>ID</th>
          <th>Interest Rate</th>
          <th>Term</th>
          <th>Available for Investment</th>
    <?php
    if($type == 'primary_market_ask'){
      $sql = "SELECT * FROM primary_market_loaneur_ask ORDER BY interest_rate DESC LIMIT 5";
      $result = $conn->query($sql);
      ?>         
        <th>Invest</th>          
        </tr>
      <?php
    }else if($type == 'secondary_market_ask'){
      $sql = "SELECT * FROM secondary_market_loaneur_ask ORDER BY interest_rate DESC LIMIT 5";
      $result = $conn->query($sql);
      ?>       
        <th>YTD</th> 
        <th>Discount/Premium</th> 
        <th>Invest</th>          
        </tr>
      <?php
    }else if($type == 'secondary_market_bid'){


    }else if($type == 'active_loans'){


    }else if($type == 'finished_loans'){


    }
    while($row = mysqli_fetch_assoc($result)){
      $months = 5;
      echo "<tr><td>". $row['id'] ."</td><td>". $row['interest_rate'] ." %</td>
      <td>". $row['term_months'] ."</td><td> € ". $row['amount_EUR'] ."</td></tr>";
    }
    echo '</table>';
  }else if($ticker == 'pgeur'){
    if($type == 'primary_market_ask'){


    }else if($type == 'secondary_market_ask'){


    }else if($type == 'secondary_market_bid'){


    }
  }
?>


<?php
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
                <th>Type</th>
                <th>Fee(EUR)</th>
                <th>Fee(Royalty)</th>
                <th>Date</th>
              </tr>
            
            <?php
                $sql = "SELECT * FROM mfeurtrades ORDER BY date DESC LIMIT 20";
                $result = $conn->query($sql);
                echo "<br><br><br> Last Trades <br>";
                
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>". $row['username'] ."</td><td>". $row['amountRP'] ."</td><td>". $row['price'] ."</td><td>". $row['orderType'] ."</td><td>". $row['feeEUR'] ."</td><td>". $row['feeRP'] ."</td><td>". $row['date'] ."</td></tr>";
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

            $sql = "SELECT * FROM mfeurbids ORDER BY price DESC LIMIT 10";
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

            $sql = "SELECT * FROM mfeurasks ORDER BY price DESC LIMIT 10";
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