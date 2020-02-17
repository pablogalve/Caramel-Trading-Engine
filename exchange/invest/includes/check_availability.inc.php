<?php 
include 'display_error.inc.php';

function check_Availability($conn, $type, $ticker, $amountRP, $amountEUR, $username){
    if($ticker == 'primary_market_pgeur' || $ticker == 'pgeur'){        
        if($type == 'buy' || $type == 'market_buy'){
            
            $sql = "SELECT eur FROM users WHERE username='$username'";
            $result = $conn->query($sql);
            
            while($row = mysqli_fetch_assoc($result)){ 
                if($row['eur'] >= $amountEUR){ 
                    return true;
                }else{
                    display_error('900');
                    return false;
                }
            }
            
        }else if($type =='sell'){
            $sql = "SELECT pg FROM users WHERE username='$username'";
            $result = $conn->query($sql);
            
            while($row = mysqli_fetch_assoc($result)){
                if($row['pg'] >= $amountRP){ 
                    return true;
                }else{
                    display_error('900');
                    return false;
                }
            }
        }
    }
}
?>