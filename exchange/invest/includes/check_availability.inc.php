<?php 

//Checks if user has enough funds to cover the operation
function check_Availability($conn, $type, $ticker, $amountRP, $amountEUR, $username){    
    if($ticker == 'primary_market_pgeur' || $ticker == 'pgeur'){        
        if($type == 'buy'){            
            $sql = "SELECT eur FROM users WHERE username='$username'";
            $result = $conn->query($sql);
            
            while($row = mysqli_fetch_assoc($result)){ 
                if($row['eur'] >= $amountEUR) return true;
                else{
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