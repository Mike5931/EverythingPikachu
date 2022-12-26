<?php
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
    $username = $_SESSION['username'];
?>
<html>
    <head>
        <title>Admin Home Page</title>
    </head>
    <body>
        <h1>Welcome <?php echo $username ?></h1>
        <form method = "post" action = "add_employee.php">
            <button type = "submit">Add new employee</button>
        </form>
        <br>
        <form method = "post" action = "add_admin.php">
            <button type = "submit">Add new admin</button>
        </form>
        <br>
        <form method = "post" action = "view_seller.php">
            <button type = "submit">View Sellers</button>
        </form>
        <br>
        <form method = "post" action = "remove_seller_form.php">
            <button type = "submit">Remove Seller</button>
        </form>
        <br>
        <form method = "post" action = "add_seller_form.php">
            <button type = "submit">Add Seller</button>
        </form>
        <br>
        <form method = "post" action = "product_search.php">
            <button type = "submit">Product Search</button>
        </form>
        <br>
        <form method = "post" action = "remove_product_form.php">
            <button type = "submit">Remove Product</button>
        </form>
        <br>
        <form method = "post" action = "view_orders.php">
            <button type = "submit">View Orders</button>
        </form>
        <br>
        <form method = "post" action = "logout.php">
            <button type = "submit">Logout</button>
        </form>
    </body>
</html>