<?php 
include 'check_availability.inc.php';
include 'match_engine.inc.php';

function newOrder($conn, $type, $ticker, $price, $amountRP, $amountEUR, $username, $date){
        
        $validData = checkValidData($price, $amountRP, $amountEUR); //Check that input data are numbers and have a valid range
        
        if($validData){
            if($type == 'buy'){
                $canCreate = check_Availability($conn, $type, $ticker, $amountRP, $amountEUR, $username);  //Checks if user has enough funds
                if($canCreate == true){
                    if($ticker == 'mfeur'){
                        $sql = "INSERT INTO mfeurbids (price, amountRP, amountEUR, username, date) 
                        VALUES ('$price','$amountRP', $amountEUR,'$username', '$date')";
                        $result = $conn->query($sql); 
                        if($result){
                            echo 'Your order has been created successfully!';
                            updateBalance($conn, $amountRP, -$amountEUR, $username, "eur");
                            checkMatch($conn);
                        }else{
                            echo 'Connection error: Your order has not been created';
                            die("Connection failed: " . $conn->connect_error);
                        }
                    }
                }else{
                    echo 'Not enough funds available';
                }
            }else if($type == 'sell'){
                if($ticker == 'mfeur'){
                    $canCreate = check_Availability($conn, $type, $ticker, $amountRP, $amountEUR, $username);  //Checks if user has enough MF
                    if($canCreate == true){
                            $sql = "INSERT INTO mfeurasks (price, amountRP, amountEUR, username, date) 
                            VALUES ('$price','$amountRP','$amountEUR','$username', '$date')";
                            $result = $conn->query($sql); 
                            if($result){
                                echo 'Your order has been created successfully!';
                                updateBalance($conn, -$amountRP, $amountEUR, $username, "mf");
                                checkMatch($conn);
                            }else{
                                echo 'Connection error: Your order has not been created';
                                die("Connection failed: " . $conn->connect_error);
                            }
                        
                    }else{
                        echo 'Not enough MF available';
                    }
                }
            }
        }        
    }


function checkValidData($price, $amountRP, $amountEUR){

    if(is_numeric($price) && $price >= 0.0001 && $price<=9999){
        if(is_numeric($amountRP) && $amountRP >= 0.001){
            if(is_numeric($amountEUR) && $amountEUR >= 0.1){
                return true;
            }else{
                echo 'Error: Minimum order size is 0.1 EUR.';
                return false;
            }
        }else{
            echo 'Error: Minimum order size is 0.001 royalties.';
            return false;
        }
    }else{
        echo 'Error: Price must be between 0.0001 and 9999.';
        return false;
    }
}

?>