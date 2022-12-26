<?php
    include("../db_connection.php");
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
    $SellID = $_POST['SellID'];
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if(!get_magic_quotes_gpc()){
       $SellID = addslashes($SellID);
    }
    
    $query = "DELETE FROM SELLER where SellID=".$SellID;
    
    $result = $db->query($query);
    
    if($result){
        echo "Seller ".$SellID." removed successfully.";  
    }
    else{
        echo "Seller not removed";
    }
    
    $db->close();
    
?>
<html>
    <head>
        <title>Remove Seller</title>
    </head>
    <body>
        <br>
        <br>
        <a href = "admin_homepage.php">Go Back</a>
    </body>
</html>
