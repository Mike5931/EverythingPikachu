<?php
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: employee_login.php");
    }
?>

<html>
    <head>
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
        <form method = "post" action = "add_seller.php">
            <Label>First Name:</Label>
            <input type = "text" id = "firstName" name = "firstName" required>
            <br>
            <br>
            <Label>Middle Initial:</Label>
            <input type = "text" id = "middleInitial" name = "middleInitial" maxlength = "1">
            <br>
            <br>
            <Label>Last Name:</Label>
            <input type = "text" id = "lastName" name = "lastName" required>
            <br>
            <br>
            <Label>User Name:</Label>
            <input type = "text" id = "username" name = "username" required>
            <br>
            <br>
            <Label>Password:</Label>
            <input type = "password" id = "password" name = "password" required>
            <br>
            <br>
            <Label>Email:</Label>
            <input type = "email" id = "email" name = "email" required>
            <br>
            <br>
            <button type = "submit">Create Seller</button>
            <button type = "reset">Clear</button>
        </form>
        <a href = "employee_homepage.php">Go Back</a>
    </body>
</html>