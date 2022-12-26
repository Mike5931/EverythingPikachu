<?php
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: employee_login.php");
    }
    
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }
?>
<html>
    <head>
        <title>Employee Homepage</title>
    </head>
    <body>
        <h1>Employee Dashboard</h1>
        <form action = "view_orders.php" method = "post">
            <button type = "submit">View Orders</button>
        </form>
        <form action = "add_seller_form.php" method = "post">
            <button type = "submit">Add Seller</button>
        </form>
        <form action = "product_search.php" method = "post">
            <button type = "submit">View Products</button>
        </form>
        <form action = "remove_product_form.php">
            <button type = "Submit">Remove Product</button>
        </form>
        <form action = "logout.php">
            <button type = "Submit">Logout</button>
        </form>
        
    </body>
</html>
