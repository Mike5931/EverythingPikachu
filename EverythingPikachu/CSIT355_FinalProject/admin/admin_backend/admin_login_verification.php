<?php
    include('../../db_connection.php');
    session_start();
    $userName = $_POST['Username'];
    $Password = $_POST['Password'];
    $LoggedIn = False;
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    if(!get_magic_quotes_gpc()){
        $userName = addslashes($userName);
        $Password = addslashes($Password);
    }
    
    $query = '';
    $results = '';
    
    $query = "SELECT Pword FROM ADMIN WHERE UserName = '$userName'";
    $results = $db->query($query);
    $pass = $results->fetch_assoc();
    $adminPassword = $pass['Pword'];

    if(password_verify($Password, $adminPassword))
    {
        $db->close();
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $userName;
        $_SESSION['password'] = $Password;
        header('Location: ../admin_homepage.php');
    }
    else
    {
        $db->close();
        echo "Incorrect username or password";
    }


        
?>