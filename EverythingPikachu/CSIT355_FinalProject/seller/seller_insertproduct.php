<?php
    include('../db_connection.php');
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: seller_login.php");
    }
    header('Content-Type: text/html; charset=ISO-8859-1'); //https://stackoverflow.com/questions/12699037/how-to-display-special-characters-in-php
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
            Insert Product Page
        </title>
        <style type = "text/css">
            label {
                width : 200px;
                display: inline-block;
            }
            textarea{
                
                vertical-align: middle;
            }
        </style>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body>
        <nav class="nav sticky-top nav-pills justify-content navbar navbar-dark bg-secondary">
            <div class="text-sm-center nav-link m-3 active navbar-brand">Welcome back <?php echo $username;?></div>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="seller_insertproduct.php" role="button" aria-expanded="page">Add Product</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="seller_addcategory.php" role="button" aria-expanded="page">Add Category</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="seller_deleteproduct.php" role="button" aria-expanded="page">Remove Product</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="./seller_backend/seller_viewproducts_verification.php" role="button" aria-expanded="page">View Products</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="seller_homepage.php" role="button" aria-expanded="page">Seller Homepage</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="../logout.php" role="button" aria-expanded="page">Logout</a>
        </nav>
        </br>
        <center>
            <h2>Enter the product information to add it to the product list and sell it to happy customers!</h2>
        </center>
        </br>
        <form action="./seller_backend/seller_insertproduct_verification.php" method="post">
            <label>Category Number:</label>
            <input type="text" name="CategoryNum" required>
            <br>
            <br>
            <label>Price:</label>
            <input type="text" name="Price" required>
            <br>
            <br>
            <label>Description:</label>
            <textarea name="Description" required></textarea>
            <br>
            <br>
            <label>Seller Number:</label>
            <input type="text" name="SupplierNum" required>
            <br>
            <br>
            <label>Inventory Number:</label>
            <input type="text" name="InventoryLevel" required>
            <br>
            <br>
            <label>Product Name:</label>
            <input type="text" name="ProductName" required>
            <br>
            <br>
            <button type="submit">Submit</button>
            <button type="reset">Clear</button>
        </form><br>
        <form action = "seller_homepage.php" method = "post">
            <button type = "submit">Back</button>
        </form>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<?php
$db->close();
?>