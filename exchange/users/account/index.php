<?php
session_start();
include '../../database.php';

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
  	header('location: http://exchange.moonfunding.com/users/registration/login');
  }else{
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
  <h2>My Account</h2>
  <h3>Personal information</h3>
</div>
<div class="content">

<?php
while($row = mysqli_fetch_array($result))
{
  echo "<ul> Investor # " . $row['id'] . "</ul>";
  echo "<ul> Username " . $row['username'] . "</ul>";
  echo "<ul> First Name </ul>";
  echo "<ul> Last Name </ul>";
  echo "<ul> Country of residence </ul>";
  echo "<ul> City  </ul>";
  echo "<ul> Address  </ul>";
  echo "<ul> Postal code  </ul>";
  echo "<ul> Email " . $row['email'] . "</ul>";
  echo "<ul> Phone  </ul>";
  echo "<ul> Language  </ul>";
}
?>
<h3>Documents</h3>
<?php
  echo "<ul> Document type </ul>";
  echo "<ul> Document number </ul>";
  echo "<ul> Expiration date  </ul>";
  echo "<ul> Country  </ul>";
  echo "<ul> Personal number  </ul>";
?>

</div>
		
</body>
</html>

