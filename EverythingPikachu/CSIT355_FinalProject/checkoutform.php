<?php
    // gets connection to data base
    include('db_connection.php');
    
    // starts a session that validates user is logged in by username or else it will send the user to the page listed below in the if statement
    session_start();
    if($_SESSION['valid'] != true)
    {
        header("Location: index.php");
    }
    
    // code used to displays errors that occur
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // checks to validate connection to the database
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database. Please try again later.';
        exit();
    }
?>


<html>
    <head>
        <title>Checkout</title>
        <style type = "text/css">
            label {
                width : 125px;
                display: inline-block;
            }
            textarea{
                
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <h1>Check Out Information</h1>
        
        <!--form used to complete the final process to checkut-->
        <form action = "checkoutreceipt.php" method = "post">
            <label for = "fname">First Name:</label>
            <input type = "text" id = "fname" name = "fname" required> <br> <br>
            
            <label for = "lname">Last Name:</label>
            <input type = "text" id = "lname" name = "lname" required> <br> <br>
            
            <label for = "address">Address:</label>
            <input type = "text" id = "address" name = "address" required> <br> <br>
            
            <label for = "city">City:</label>
            <input type = "text" id = "city" name = "city" required> <br> <br>
            
            <label for = "state">State:</label>
            <input type = "text" id = "state" name = "state" required> <br> <br>
            
            <label for = "zip"> Zip:</label>
            <input type = "text" id = "zip" name = "zip" required> <br> <br>
            
            <button type="submit">Checkout</button>

        </form>
    </body>
</html>

<?php
    // close the database
    $db->close();
?>