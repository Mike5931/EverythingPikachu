<?php
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
?>


<html>
    <head>
        <title>Add new admin</title>
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
        <h1>Add a new admin here:</h1>
        <form action = "admin_creation.php" method ="post">
            <label>First Name:</label>
            <input type = "text" id="Fname" name = "Fname" placeholder = "First Name" required>
            <br>
            <br>
            <label>Last Name:</label>
            <input type = "text" id="Lname" name = "Lname" placeholder = "Last Name" required>
            <br>
            <br>
            <label>Email:</label>
            <input type = "email" id="email" name = "email" placeholder = "test@google.com" required>
            <br>
            <br>
            <label>User Name:</label>
            <input type = "text" id="Username" name = "Username" placeholder = "Username" required>
            <br>
            <br>
            <label>Password:</label>
            <input type = "password" id="Pword" name = "Pword" placeholder = "Password" required>
            <br>
            <br>
            <button type = "Submit">Add</button>
            <button type = "Reset">Clear</button>
        </form>
        <br>
        <br>
        <a href = "admin_homepage.php">Go Back</a>
        
    </body>
</html>