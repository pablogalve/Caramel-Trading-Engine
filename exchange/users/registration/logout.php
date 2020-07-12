<?php
session_start();
session_unset();
session_destroy();

header("location:https://www.pablogalve.com/caramel_capital");
exit();
?>