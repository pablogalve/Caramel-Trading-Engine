<?php 
function check_Availability($conn, $type, $ticker, $amountRP, $amountEUR, $username){
    if($ticker == 'mfeur'){
        
        if($type == 'buy'){
            
            $sql = "SELECT eur FROM users WHERE uid='$username'";
            $result = $conn->query($sql);
            
            while($row = mysqli_fetch_assoc($result)){ //SALTA ERROR
            echo ' eur: ' . $row['eur'];
                if($row['eur'] >= $amountEUR){ //You need available funds to be greater than EUR in the buy order
                    return true;
                }else{
                    //echo ' Error:eurAvailable: ' . $row['eurAvailable'];
                    echo 'Error. Not enough available funds';
                    return false;
                }
            }
            
        }else if($type =='sell'){
            $sql = "SELECT mf FROM users WHERE uid='$username'";
            $result = $conn->query($sql);
            
            while($row = mysqli_fetch_assoc($result)){
                if($row['mf'] >= $amountRP){ //You need available mf to be greater than MF in the sell order
                    return true;
                }else{
                    echo 'Error. Not enough available RP';
                    return false;
                }
            }
        }
    }
}
?>