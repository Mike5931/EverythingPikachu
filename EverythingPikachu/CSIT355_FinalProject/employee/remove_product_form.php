<?php
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: employee_login.php");
    }
?>


<html>
    <head>
        <title>Remove Product</title>
    </head>
    <body>
        <h1>Remove Product from Database:</h1>
        <h2>Enter the product number for the product that you would like to remove:</h2>
        <form action = "remove_product.php" method = "post">
            <Label>Product Number:</Label>
            <input type = "text" name = "ProductNum" required>
            <br>
            <br>
            <button type = "submit">Remove</button>
        </form>
        <a href = "employee_homepage.php">Go Back</a>
    </body>
</html>