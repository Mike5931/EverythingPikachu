<?php
    include('../db_connection.php');
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Email = $_POST['email'];
    $Username = $_POST['Username'];
    $Pword = $_POST['Pword'];
    $query = '';
    $result = '';
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    

    
    if(!get_magic_quotes_gpc()){
        $Fname = addslashes($Fname);
        $Lname = addslashes($Lname);
        $Email = addslashes($Email);
        $Pword = addslashes($Pword);
    }
    
        $Pword = password_hash($Pword, PASSWORD_DEFAULT);
    
    $query = "insert into ADMIN (UserName, Pword, FirstName, LastName, Email) 
    values ('$Username', '$Pword', '$Fname', '$Lname', '$Email')";
    $result = $db->query($query); 
            
    //echo mysqli_error($query);
    if ($result){
        echo $Fname." added into database.";
    }
    else{
        echo "An error has occured. User not added.";
    }
    
?>
<html>
    <head>
        
    </head>
    <body>
        <p>
            <br>
            <br>
            <label>Go back to homepage: </label>
            <form action = "admin_homepage.php" method = "post">
                <button type = "submit">Back</button>
            </form>
        </p>
        <?php $db->close(); ?>
    </body>
</html>