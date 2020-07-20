<?php
include '../../headers/header_setup.php';
include '../../database.php';
?>

<!DOCTYPE html> 
<html> 
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<style>
    .button {
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    }
</style>
<body style="text-align:center;"> 
	<br>
	<h1 style="color:green;"> 
		Add money to your virtual account!
	</h1> 
	
	<div class='alert alert-warning'>
        <strong>Hey!</strong> As this is a live demo, bank accounts have been disabled. All the money is only for demo purposes.<br>
        In a real environment, the user would be required to do a bank transfer in order to get e-money credited.
    </div>
	
	<?php
		if(array_key_exists('deposit1k', $_POST)) { 
			deposit($conn, 1000); 
        } else if(array_key_exists('deposit10k', $_POST)) { 
			deposit($conn, 10000); 
        } else if(array_key_exists('deposit25k', $_POST)) { 
			deposit($conn, 25000); 
        } 
        
		function deposit($conn, $amount) { 
            $username = $_SESSION['username'];
            $sql = "UPDATE users SET eur='$amount' WHERE username='$username'";
            $result = $conn->query($sql);
            if($result){
                //sql request is a success
                echo "<div class='alert alert-success'>
                    <strong>Success!</strong> Your account balance has been set up to $amount €.
                </div>";
                echo "<div class='alert alert-info'>
                    <strong>Everything is set up for you!</strong> You can now use that virtual money to trade at our market!
                </div>";
            }else{
                //sql request failed
                echo "<div class='alert alert-danger'>
                    <strong>Error!</strong> Your request could not be processed. Please try again.
                </div>";
            }
			 
		} 
	?> 

	<form method="post"> 
		<input type="submit" name="deposit1k"
			class="button" value="Set account to 1.000,00€" style="background-color:forestgreen"/> 
        <input type="submit" name="deposit10k"
            class="button" value="Set account to 10.000,00€" style="background-color:darkgreen"/> 
        <input type="submit" name="deposit25k"
            class="button" value="Set account to 25.000,00€" style="background-color:forestgreen"/> 
	</form> 
</head> 

</html> 
