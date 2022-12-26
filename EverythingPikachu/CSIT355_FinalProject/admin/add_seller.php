<?php
    include('../db_connection.php');
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
    $firstName = $_POST['firstName'];
    $middleInitial = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['username'];
    $Pword = $_POST['password'];
    $email = $_POST['email'];
    $query = '';
    $result = '';
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    if(!get_magic_quotes_gpc()){
        $firstName = addslashes($firstName);
        $middleInitial = addslashes($middleInitial);
        $lastName = addslashes($lastName);
        $userName = addslashes($userName);
        $Pword = addslashes($Pword);
        $email = addslashes($email);
    }
    
    $Pword = password_hash($Pword, PASSWORD_DEFAULT);
    
    $query = "insert into SELLER(Fname, Minit, Lname, UserName, Pword, Email) 
                values ('$firstName', '$middleInitial', '$lastName', '$userName', '$Pword', '$email')";
                
    $result = $db->query($query); 
            
    //echo mysqli_error($query);
    if ($result){
        echo $firstName." added into database.";
    }
    else{
        echo "An error has occured. User not added.";
    }
    
    $db->close();
?>
<html>
    <head>
        <title>Add Seller</title>
    </head>
    <body>
        <br>
        <br>
        <a href = "admin_homepage.php"> Go Back</a>
    </body>
</html>