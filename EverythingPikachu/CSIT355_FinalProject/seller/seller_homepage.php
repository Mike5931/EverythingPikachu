<?php
    include('../db_connection.php');
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: seller_login.php");
    }
    $username = $_SESSION['username'];
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
        <meta charset="utf-8">
        <title>
            Product Page
        </title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body>
        <nav class="nav sticky-top nav-pills justify-content navbar navbar-dark bg-secondary">
            <div class="text-sm-center nav-link m-3 active navbar-brand">Welcome back <?php echo $username;?></div>
        </nav>
        <p>If you want to add a product</p>
        <a href="seller_insertproduct.php">
            <button type="submit">Add Product Here!</button></br>
        </a><br>
        <p>If you want to remove a product</p>
        <a href="seller_deleteproduct.php">
            <button type="submit">Remove Product Here!</button></br>
        </a><br>
        <p>If you want to add a category</p>
        <a href="seller_addcategory.php">
            <button type="submit">Add Category Here!</button></br>
        </a><br>
        <p>If you want to view the products</p>
        <a href="./seller_backend/seller_viewproducts_verification.php">
            <button type="submit">View Product Here!</button></br>
        </a><br>
        <a href="logout.php">
            <button type="submit">Logout</button></br>
        </a><br>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<?php
$db->close();
?>