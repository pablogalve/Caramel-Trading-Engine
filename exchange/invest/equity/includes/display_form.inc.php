<?php
include ($_SERVER['DOCUMENT_ROOT'].'/invest/includes/create_order.inc.php');

function display_form($conn, $name){
    switch($name){
        case 'create_market_order':
            ?><h2>Instant order (Not working yet)</h2>
            <?php
            //Input form to buy royalties
            echo "<form action='".create_market_order($conn)."' method='POST'>
                I want to spend:
                <input type='number' name='amount_EUR' step='0.0001' min='10'> € <br>
                <input type='hidden' name='ticker' value='pgeur'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <button type='submit' name='submit_buy' >MARKET BUY</button>
                <button type='submit' name='submit_sell' >MARKET SELL</button><br>
            </form>";
        break;
        case 'create_limit_order':
            ?><h2>Limit order</h2><?php
            echo "<form action='".create_limit_order($conn)."' method='POST'>
                Amount:
                <input type='number' name='amount_RP' step='0.0001' min='10.0000'> PG <br>
                Price:
                <input type='number' name='price' step='0.01' min='0'> € <br>
                <input type='hidden' name='ticker' value='pgeur'>
                <input type='hidden' name='type' value='limit'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <button type='submit' name='submit_buy' >LIMIT BUY</button>
                <button type='submit' name='submit_sell' >LIMIT SELL</button><br>
            </form>"; 
        break;
    }
}
?>