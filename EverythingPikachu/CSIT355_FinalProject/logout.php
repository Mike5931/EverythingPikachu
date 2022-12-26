<?php
    // this logout page is used to destroy the session that has been created for the user. We want a new session everytime
   session_start();
   
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["valid"]);
   $_SESSION = [];
   
   header('location: index.php');
?>