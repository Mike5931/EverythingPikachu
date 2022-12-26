<?php
    include('../../db_connection.php');
    session_start();
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $result = '';
    $query = '';
    $LoggedIn = False;
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    if(empty($username)||empty($password)){
        echo 'You did not enter your login information. Please go back and login';
        exit;
    }
    
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to the database. Please try again later.';
        exit;
    }
    
    if(!get_magic_quotes_gpc()){
        $username = addslashes($username);
        $password = addslashes($password);
    }
     $query = "SELECT pWord FROM CREDENTIALS WHERE userName = '$username'";
    
    $result = $db->query($query);
    
    
    $row = $result->fetch_assoc();
    $hashPassword = $row['pWord'];
    
    if(password_verify($password, $hashPassword))
    {
        $db->close();
        $_SESSION['valid'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('Location: ../employee_homepage.php');
    }
    else
    {
        $db->close();
        echo "Incorrect password";
    }
?>