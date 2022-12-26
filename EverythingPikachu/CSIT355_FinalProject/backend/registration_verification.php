<?php
    include('../db_connection.php');
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $zipCode = $_POST['zipCode'];
    $phoneNumber = $_POST['phoneNumber'];
    $query = '';
    $result = '';
    if(!get_magic_quotes_gpc()){
        $Username = addslashes($Username);
        $Password = addslashes($Password);
        $firstName = addslashes($firstName);
        $lastName = addslashes($lastName);
        $Email = addslashes($Email);
        $Address = addslashes($Address);
        $City = addslashes($City);
        $State = addslashes($State);
        $zipCode = addslashes($zipCode);
        $phoneNumber = addslashes($phoneNumber);
    }
    if(empty($Username)||empty($Password)||empty($firstName)||empty($lastName)||empty($Email)||empty($Address)||empty($City)||empty($State)||empty($zipCode)||empty($phoneNumber)){
        $_SESSION['reg_err'] = true;
        header('Location: ../register.php');
        $db = null;
        $db->close();
    }
   
?>
<html>
    <head>
        <title>Registration Confirmation</title>
    </head>
    <body>
        <p>
            Thank you <?php echo $firstName; ?>! You are now a registered user.
        </p>
        <?php
            $Password = password_hash($Password, PASSWORD_DEFAULT);
            $query = "insert into CUSTOMER (UserName , Pword , Fname , Lname, Email , StreetAddress , City , State , Zip , PhoneNumber) 
            values ('$Username','$Password','$firstName','$lastName','$Email','$Address','$City','$State','$zipCode','$phoneNumber')";
            
            
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
        <h3>Click Here to Go Back to the Login Page:</h3>
        <p>
            <form method = "post" action = "../index.php">
                <button type = "submit">Go to Login</button>
            </form>
        </p>
    </body>
</html>