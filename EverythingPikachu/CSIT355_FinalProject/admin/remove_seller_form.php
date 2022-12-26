<?php
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
?>


<html>
    <head>
        <title>Remove Seller</title>
    </head>
    <body>
        <h1>Remove Product from Database:</h1>
        <h2>Enter the SellerID for the Seller that you would like to remove:</h2>
        <form action = "remove_seller.php" method = "post">
            <Label>Seller ID:</Label>
            <input type = "text" name = "SellID" required>
            <br>
            <br>
            <button type = "submit">Remove</button>
        </form>
        <a href = "admin_homepage.php">Go Back</a>
    </body>
</html>