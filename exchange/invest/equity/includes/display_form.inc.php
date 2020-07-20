<?php
include '../../invest/includes/create_order.inc.php';
include '../../invest/includes/cancel_order_manually.php';

function display_form($conn, $name){
    //To get available funds
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $sql = "SELECT eur,pg FROM users WHERE username='$username' LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_array();
    }
    ?>
        <style>
            .buy_button, .sell_button{
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
            .buy_button {
                background-color: green;                
            }
            .sell_button {
                background-color: red;
            }
        </style>
    <?php

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
                <table>
                    <tr>
                        <td>
                            Amount
                        </td>
                        <td>
                            <input type='number' name='amount_RP' step='0.0001' min='5.0000'>
                        </td>
                        <td>
                            CC
                        </td>
                    </tr>  
                    <tr>
                        <td>
                            Price
                        </td>
                        <td>
                            <input type='number' name='price' step='0.01' min='0'>
                        </td>
                        <td>
                            €
                        </td>
                    </tr> 
                </table>
                <input type='hidden' name='ticker' value='pgeur'>
                <input type='hidden' name='type' value='limit'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <button class='buy_button' type='submit' name='submit_buy' >LIMIT BUY</button>
                <button class='sell_button' type='submit' name='submit_sell' >LIMIT SELL</button><br>
            </form>"; 
        break;
        case 'create_limit_buy':
            ?><h2>BUY PG Royalties</h2><?php
            echo "$row[eur] € Available<br>";
            echo "<form action='".create_limit_order($conn)."' method='POST'>
                Amount:
                <input type='number' name='amount_RP' step='0.0001' min='10.0000'> PG <br>
                Price:
                <input type='number' name='price' step='0.01' min='0'> € <br>
                <input type='hidden' name='ticker' value='pgeur'>
                <input type='hidden' name='type' value='limit'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                Total: € <br>
                <button type='submit' name='submit_buy' >LIMIT BUY</button>
            </form>";             
        break;
        case 'create_limit_sell':
            ?><h2>SELL PG Royalties</h2><?php
            echo "$row[pg] PG Available<br>";
            echo "<form action='".create_limit_order($conn, 30)."' method='POST'>
                Amount:
                <input type='number' name='amount_RP' step='0.0001' min='10.0000'> PG <br>
                Price:
                <input type='number' name='price' step='0.01' min='0'> € <br>
                <input type='hidden' name='ticker' value='pgeur'>
                <input type='hidden' name='type' value='limit'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                Total: € <br>
                <button type='submit' name='submit_sell' >LIMIT SELL</button><br>
            </form>"; 
        break;
    }
}
?>