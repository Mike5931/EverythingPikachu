<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["valid"]);
   $_SESSION = [];
   
   header('location: admin_login.php');
?>