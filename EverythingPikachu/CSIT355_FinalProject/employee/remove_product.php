<?php
    include("../db_connection.php");
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: employee_login.php");
    }
    $ProductNum = $_POST['ProductNum'];
    //$query = '';
   // $result = '';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if(!get_magic_quotes_gpc()){
       $ProductNum = addslashes($ProductNum);
    }
    
    $query = "DELETE FROM PRODUCT where ProductNum=".$ProductNum;
    
    $result = $db->query($query);
    
    if($result){
        echo "Product ".$ProductNum." removed successfully.";  
    }
    else{
        echo "Product not removed";
    }
    
    $db->close();
    
?>
