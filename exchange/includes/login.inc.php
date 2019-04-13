<?php
include '../dbh.php';

/*if (isset($_SESSION['uid'])) {
      echo "You are already logged in!";
 }else{
     echo 'You are not logged in!';
 }*/


if(isset($_POST['submitLogin'])){
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE uid = '$myusername' and pwd = '$mypassword'";
    $result = $conn->query($sql);
    
    
    if (!$row = mysqli_fetch_assoc($result)) {
        echo "Your username or password is incorrect!";
        header("Location: ../login");
    } else {
        $_SESSION['username'] = $row['uid'];
        header("Location: ../welcome");
    }


}
?>