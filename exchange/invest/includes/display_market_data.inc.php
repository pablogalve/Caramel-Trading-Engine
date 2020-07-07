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
  }
  .ask_price{
    color: red;    
  }
  .bid_price{
    color: green;
  }
  tr.spaceUnder>td {
  padding-bottom: 0em;
  font-size:15px;
  }
  * {
  box-sizing: border-box;
  }

  /* Create two equal columns that floats next to each other */
  .column {
    float: left;
    width: 50%;
    padding: 10px;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
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
      ?><h1>Primary Market Asks</h1><?php
      $sql = "SELECT * FROM primary_market_loaneur_ask ORDER BY interest_rate DESC LIMIT 5";
      $result = $conn->query($sql);
      ?>         
        <th>Invest</th>          
        </tr>
      <?php
    }else if($type == 'secondary_market_ask'){
      ?><h1>Secondary Market Asks</h1><?php
      $sql = "SELECT * FROM secondary_market_loaneur_ask ORDER BY interest_rate DESC LIMIT 5";
      $result = $conn->query($sql);
      ?>       
        <th>YTM</th> 
        <th>Discount/Premium</th> 
        <th>Invest</th>          
        </tr>
      <?php
    }else if($type == 'active_loans'){


    }else if($type == 'finished_loans'){


    }
    while($row = mysqli_fetch_assoc($result)){
      echo "<tr><td>". $row['id'] ."</td><td>". $row['interest_rate'] ." %</td>
      <td>". $row['term_months'] ."</td><td> € ". $row['amount_EUR'] ."</td></tr>";
    }
    echo '</table>';

  }else if($ticker == 'pgeur'){
    if($type == 'orderbook_styled'){
      ?>
      <div class="row">
        <div class="column">
          <h3>Bids</h3>
          <table class="w3-hoverable">        
          <thead>
            <tr>
              <th>Value</th>
              <th>Amount</th>
              <th>Price</th>
            </tr>
          </thead>
          <?php
          //We get bids from database
          $sql = "SELECT * FROM secondary_market_pgeur_bid ORDER BY price DESC LIMIT 20";
          $result = $conn->query($sql);

          while($row = mysqli_fetch_assoc($result)){
            //We display ( Value | Amount | Price )
            $value = $row['amount_RP']*$row['price'];

            echo "<tr class='spaceUnder'><td>". 
            round($value, 2, PHP_ROUND_HALF_EVEN) . "</td> 
            <td>". round($row['amount_RP'], 2, PHP_ROUND_HALF_EVEN) ." </td>
            <td><div class='bid_price'>" . round($row['price'], 2, PHP_ROUND_HALF_EVEN) . "€</div></td>";
          }
          ?>
        </table>
        </div>
        <div class="column">
          <h3>Asks</h3>
          <table class="w3-hoverable">
          <thead>
            <tr>
              <th>Price</th>
              <th>Amount</th>
              <th>Value</th>
            </tr>
          </thead>
          <?php
          //We get asks from database
          $sql = "SELECT * FROM secondary_market_pgeur_ask ORDER BY price ASC LIMIT 20";
          $result = $conn->query($sql);

          while($row = mysqli_fetch_assoc($result)){
            //We display ( Price | Amount | Value )
            $value = $row['amount_RP']*$row['price'];

            echo "<tr class='spaceUnder'><td><div class='ask_price'>". 
            round($row['price'], 2, PHP_ROUND_HALF_EVEN) . "</td> 
            <td>". round($row['amount_RP'], 2, PHP_ROUND_HALF_EVEN) ." </td>
            <td>" . round($value, 2, PHP_ROUND_HALF_EVEN) . "€</div></td>";
          }
          ?>
        </table>
        </div>
      </div>
      <?php
    }else{
      ?>
      <table style="width:10%">
        <tr>
          <th>Price</th>
          <th>Amount</th>
          <th>Value</th>
      <?php

      $style = "null";

      if($type == 'primary_market_ask'){
        ?><h1>Primary Market Asks</h1><?php
        $sql = "SELECT * FROM primary_market_pgeur_ask ORDER BY price DESC LIMIT 10";
        $result = $conn->query($sql);

      }else if($type == 'secondary_market_ask'){
        $sql = "SELECT * FROM secondary_market_pgeur_ask ORDER BY price DESC LIMIT 10";
        $result = $conn->query($sql);
        $style = "ask_price";    

      }else if($type == 'secondary_market_bid'){
        $sql = "SELECT * FROM secondary_market_pgeur_bid ORDER BY price DESC LIMIT 10";
        $result = $conn->query($sql);
        $style = "bid_price";   

      }else if($type == 'last_trades'){
        ?><h1>Last Trades</h1>
        <th>Date</th><?php
        $sql = "SELECT * FROM trades ORDER BY date DESC LIMIT 30";
        $result = $conn->query($sql);
      }

      while($row = mysqli_fetch_assoc($result)){
        //We setup the color
        if($type == 'last_trades'){
          if($row['type'] == 'buy')$style = "bid_price";
          else if($row['type'] == 'sell')$style = "ask_price";
        }

        //We display ( Price | Amount | Value )
        $value = $row['amount_RP']*$row['price'];
        echo "<tr class='spaceUnder'><td><div class='$style'>". 
        round($row['price'], 2, PHP_ROUND_HALF_EVEN) . "</td> 
        <td>". round($row['amount_RP'], 2, PHP_ROUND_HALF_EVEN) ." </td>
        <td>" . round($value, 2, PHP_ROUND_HALF_EVEN) . "€</div></td>";

        //We display ( Type | Date ) only if it's "last trades"
        if($type == 'last_trades'){
          //We calculate date in (H:i:s)
          $date = $row['date'];
          $date = strtotime($date);

          echo "<td>". date('H:i:s', $date) ."</td></tr>";
        }
        else echo "</tr>";
      }
      echo '</table>';
    }    
  }
}
?>
