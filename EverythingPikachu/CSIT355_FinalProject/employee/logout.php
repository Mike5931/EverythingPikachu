<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["valid"]);
   $_SESSION = [];
   
   header('location: employee_login.php');
?>