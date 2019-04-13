<?php
    session_start();

echo 'Bienvenido';
 if (isset($_SESSION['uid'])) {
     echo 'Has iniciado sesion';
  echo $_SESSION['uid'];
 }else{
     echo "You are not logged in!";
     header("Location: login.php");
 }
?>
 

</body>
</html>
