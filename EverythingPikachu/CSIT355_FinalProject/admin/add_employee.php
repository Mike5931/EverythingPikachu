<?php
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
?>


<html>
    <head>
        <title>Add new employee</title>
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
        <h1>Add a new employee here:</h1>
        <form action = "employee_creation.php" method ="post">
            <label>First Name:</label>
            <input type = "text" id="Fname" name = "Fname" placeholder = "First Name" required>
            <br>
            <br>
            <label>Middle Initial:</label>
            <input type = "text" id="Minit" name = "Minit" placeholder = "Middle Initial" maxlength = "1">
            <br>
            <br>
            <label>Last Name:</label>
            <input type = "text" id="Lname" name = "Lname" placeholder = "Last Name" required>
            <br>
            <br>
            <label>SSN:</label>
            <input type = "password" id="SSN" name = "SSN" placeholder = "XXX-XX-XXXX" pattern = "\d{3}-\d{2}-\d{4}" required>
            <br>
            <br>
            <label>Birthday:</label>
            <input type = "date" id="Bdate" name = "Bdate" placeholder = "MM/DD/YYYY" required>
            <br>
            <br>
            <label>Phone Number:</label>
            <input type = "text" id="Number" name = "Number" placeholder = "##########" required>
            <br>
            <br>
            <label>Street Address:</label>
            <input type = "text" id="streetAddress" name = "streetAddress" placeholder = "Street Address" required>
            <br>
            <br>
            <label>City:</label>
            <input type = "text" id="City" name = "City" placeholder = "City" required>
            <br>
            <br>
            <label>State:</label>
            <input type = "text" id="State" name = "State" placeholder = "Ex: NJ" maxlength = "2" required>
            <br>
            <br>
            <label>Zip Code:</label>
            <input type = "text" id="zipCode" name = "zipCode" placeholder = "Zip Code" maxlength = "5" required>
            <br>
            <br>
            <label>Email:</label>
            <input type = "email" id="email" name = "email" placeholder = "test@google.com" required>
            <br>
            <br>
            <label>Sex:</label>
            <input list = "options" id="sex" name = "sex" placeholder = "Sex" required>
            <datalist id = "options">
                <option value = "Male"></option>
                <option value = "Female"></option>
            </datalist>
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