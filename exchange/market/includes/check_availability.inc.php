<?php 
function check_Availability($conn, $type, $ticker, $amountRP, $amountEUR, $username){
    if($ticker == 'mfeur'){
        
        if($type == 'buy'){
            
            $sql = "SELECT eurAvailable FROM users WHERE uid='$username'";
            $result = $conn->query($sql);
            
            while($row = mysqli_fetch_assoc($result)){ //SALTA ERROR
            echo ' eurAvailable: ' . $row['eurAvailable'];
                if($row['eurAvailable'] >= $amountEUR){ //You need available funds to be greater than EUR in the buy order
                    echo 'suficiente';
                    return true;
                }else{
                    //echo ' Error:eurAvailable: ' . $row['eurAvailable'];
                    echo 'nastis';
                    return false;
                }
            }
            
        }else if($type =='sell'){
            $sql = "SELECT mfAvailable FROM users WHERE uid='$username'";
            $result = $conn->query($sql);
            
            while($row = mysqli_fetch_assoc($result)){
                if($row['mfAvailable'] >= $amountRP){ //You need available mf to be greater than MF in the sell order
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
}
?>