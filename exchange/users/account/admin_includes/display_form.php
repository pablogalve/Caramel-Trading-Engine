<?php
include 'admin_includes/create_mint.php';
include 'admin_includes/create_loan.php';
include 'admin_includes/create_deposit.php';
include 'admin_includes/create_bonus.php';

function display_form($conn, $name){
    /*
    Form options available
    1. credit_deposit
    2. credit_bonus
    3. confirm_withdrawal
    4. mint_royalties
    5. issue_loan
    6. freeze_account
    */
    switch($name){
        case 'credit_deposit':
            ?><h3>Credit Deposit</h3>  
            <p>Use this only to credit deposits to investors.</p>
            <?php
                echo "<form action='".create_deposit($conn)."' method='POST'>
                    ID:
                    <input type='number' name='id'><br>
                    Amount:
                    <input type='number' name='amount_EUR' step='0.01'>€<br>    
                    Reference:
                    <input type='text' name='reference' placeholder='deposit'><br> 
                    Change status:
                    <select name='status'>
                        <option value='confirmed'>Confirmed</option>
                        <option value='rejected'>Rejected</option>
                        <option value='pending'>Pending</option>
                    </select><br>
                    Beneficiary:
                    <input type='text' name='beneficiary'><br> 
                    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>      
                    <button type='submit' name='submit_deposit' >Credit Deposit</button>
                </form>"; 
        break;
        case 'credit_bonus':
            ?><h3>Credit Bonus</h3>  
            <p>Use this only to credit bonuses to users.</p>
            <?php
            //TODO: Bonus system
        break;
        case 'confirm_withdrawal':
            ?><h3>Confirm Withdrawal</h3>  
            <p>Use this only to create bank transfers to investors.</p>
            <?php
            //TODO: Withdrawal system
        break;
        case 'mint_royalties':
            ?><h3>Mint Royalties and Sell on Primary Market</h3> 
            <p>Creates new royalties and lists them for sale at primary market. 
            If the order is cancelled, royalties are burned out of the system again.</p>
            <?php
                echo "<form action='".create_mint($conn)."' method='POST'>
                    Amount:
                    <input type='number' name='amount_RP'>PG<br>
                    Price:
                    <input type='number' name='price' step='0.01'>€<br>      
                    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>      
                    <button type='submit' name='submit_mint' >Mint Royalties</button>
                </form>"; 
        break;
        case 'issue_loan':
            ?><h3>Issue loans to Primary Market</h3> 
            <p>Use that to create and issue new loans so that investors can buy them.</p> 
            <?php
                echo "<form action='".issue_loan($conn)."' method='POST'>
                    Amount:
                    <input type='number' name='amount_EUR'> €<br>      
                    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>      
                    Interest Rate:
                    <input type='number' name='interest_rate' step='0.01'> % <br>
                    Term:
                    <input type='number' name='term'> Months <br>
                    <button type='submit' name='issue_loan'>Issue Loan</button>
                </form>";   
        break;
        case 'freeze_account':
            //TODO: freeze system
        break;
    }
}
?>