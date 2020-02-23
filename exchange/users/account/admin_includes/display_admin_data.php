<?php

function display_admin_data($name){
    /*
    Data options available
    1. pending_deposits
    2. pending_bonuses
    3. pending_withdrawals
    */
    switch($name){
        case 'pending_deposits':
            ?><h3>Pending Deposits</h3>  
            <table style="width:100%">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Amount</th>
                    <th>Reference</th>
                </tr>
            </table>
            <?php
        break;
        case 'pending_bonuses':
            ?><h3>Pending Bonuses</h3> 
            <table style="width:100%">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Bonus Amount</th>
                    <th>Volume</th>
                </tr>
            </table>
            <?php
        break;
        case 'pending_withdrawals':
            ?><h3>Pending Withdrawals</h3>  
            <table style="width:100%">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Amount</th>
                    <th>Reference</th>
                </tr>
            </table>
            <?php
        break;
    }
}
?>