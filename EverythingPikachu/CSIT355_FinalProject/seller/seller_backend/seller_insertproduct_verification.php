<?php
    include('../../db_connection.php');
    session_start();
    if($_SESSION['valid'] != true)
    {
        header("Location: ../seller_login.php");
    }
    $username = $_SESSION['username'];
    $CategoryNum = $_POST['CategoryNum'];
    $Price = $_POST['Price'];
    $Description = $_POST['Description'];
    $SupplierNum = $_POST['SupplierNum'];
    $InventoryLevel = $_POST['InventoryLevel'];
    $ProductName = $_POST['ProductName'];
    $result = '';
    $query = '';
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    /*
    if(empty($CategoryNum)||empty($Price)||empty($Description)||empty($SupplierNum)||empty($InventoryLevel)||empty($ProductName)||empty($ImageLink)){
        echo 'Please enter product information.';
        exit;
    }*/
    
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }
    
    if(!get_magic_quotes_gpc()){
        $CategoryNum = addslashes($CategoryNum);
        $Price = addslashes($Price);
        $Description = addslashes($Description);
        $SupplierNum = addslashes($SupplierNum);
        $InventoryLevel = addslashes($InventoryLevel);
        $ProductName = addslashes($ProductName);
    }
        
    $query = "INSERT INTO PRODUCT(CategoryNum, Price, ProductNum, Description, SellerNum, InventoryLevel, ProductName) VALUES 
    ('$CategoryNum', '$Price', NULL, '$Description', '$SupplierNum', '$InventoryLevel', '$ProductName')";
    //$query = "INSERT INTO PRODUCT VALUES ('".$CategoryNum."', '".$Price."', '".NULL."', '".$Description."', '".$SupplierNum."', '".$InventoryLevel."', '".$ProductName."')";
    $result=$db->query($query);
    ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            View Products
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <nav class="nav sticky-top nav-pills justify-content navbar navbar-dark bg-secondary">
            <div class="text-sm-center nav-link m-3 active navbar-brand">Welcome back <?php echo $username;?> </div>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="../seller_insertproduct.php" role="button" aria-expanded="page">Add Product</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="../seller_addcategory.php" role="button" aria-expanded="page">Add Category</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="../seller_deleteproduct.php" role="button" aria-expanded="page">Remove Product</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="seller_viewproducts_verification.php" role="button" aria-expanded="page">View Products</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="../seller_homepage.php" role="button" aria-expanded="page">Seller Homepage</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="../../logout.php" role="button" aria-expanded="page">Logout</a>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<?php
    if ($result) {
      echo  $db->affected_rows." Product ". "<b>$ProductName</b>"." inserted into database.";
  } else {
  	  echo "An error has occurred.  The item was not added.";
  }
    
    $db->close();
?>