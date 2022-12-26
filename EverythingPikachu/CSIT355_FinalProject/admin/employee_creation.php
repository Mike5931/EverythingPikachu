<?php
    include('../db_connection.php');
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
    $Fname = $_POST['Fname'];
    $Minit = $_POST['Minit'];
    $Lname = $_POST['Lname'];
    $SSN = $_POST['SSN'];
    $Bdate = $_POST['Bdate'];
    $Number = $_POST['Number'];
    $streetAddress = $_POST['streetAddress'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $zipCode = $_POST['zipCode'];
    $Email = $_POST['email'];
    $Sex = $_POST['sex'];
    $Username = $_POST['Username'];
    $Pword = $_POST['Pword'];
    $query = '';
    $query2 = '';
    $result = '';
    $result2 = '';
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    $Pword = password_hash($Pword, PASSWORD_DEFAULT);
    
    if(!get_magic_quotes_gpc()){
        $Fname = addslashes($Fname);
        $Minit = addslashes($Minit);
        $Lname = addslashes($Lname);
        $SSN = addslashes($SSN);
        $Bdate = addslashes($Bdate);
        $Number = addslashes($Number);
        $streetAddress = addslashes($streetAddress);
        $City = addslashes($City);
        $State = addslashes($State);
        $zipCode = addslashes($zipCode);
        $Email = addslashes($Email);
        $Sex = addslashes($Sex);
    }
    
    $query = "insert into EMPLOYEE (Fname, Minit, Lname, SSN, Bdate, PhoneNumber, StreetAddress, City, State, Zip, Email, Sex) 
    values ('$Fname', '$Minit', '$Lname', '$SSN', '$Bdate', '$Number', '$streetAddress', '$City', '$State', '$zipCode', '$Email', '$Sex')";
    $result = $db->query($query); 
            
    //echo mysqli_error($query);
    if ($result){
        echo $Fname." added into database.";
    }
    else{
        echo "An error has occured. User not added.";
    }
    
    $query2 = "insert into CREDENTIALS values ('$Fname', '$Lname', '$Username', '$Pword')";
    $result2 = $db->query($query2);
     //echo mysqli_error($query);
    if (!$result2){
        echo "An error has occured. User not added.";
    }
?>
<html>
    <head>
        
    </head>
    <body>
        <h1>Welcome</h1>
        <p>
            <label>Go back to homepage: </label>
            <form action = "admin_homepage.php" method = "post">
                <button type = "submit">Back</button>
            </form>
        </p>
        <?php $db->close(); ?>
    </body>
</html>