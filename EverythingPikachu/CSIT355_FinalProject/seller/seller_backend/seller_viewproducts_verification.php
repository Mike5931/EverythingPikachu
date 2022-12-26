<?php
    include('../../db_connection.php');
    session_start();
    if($_SESSION['valid'] != true)
    {
        header("Location: seller_login.php");
    }
    header('Content-Type: text/html; charset=ISO-8859-1'); //https://stackoverflow.com/questions/12699037/how-to-display-special-characters-in-php

    $username = $_SESSION['username'];
    $result = '';
    $query = '';
    $query2='';
    $result2='';
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }
    $query2="SELECT SellID FROM SELLER WHERE UserName = '$username'";
    $result2=$db->query($query2);
    $ID=$result2->fetch_assoc();
    $SellID=$ID['SellID'];
     
    $query = "SELECT * FROM PRODUCT,SELLER WHERE UserName = '$username' AND SellerNum = $SellID AND SellID = $SellID";
    $result = $db->query($query);
  $num_results = $result->num_rows;
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
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="../seller_viewproducts.php" role="button" aria-expanded="page">View Products</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="../seller_homepage.php" role="button" aria-expanded="page">Seller Homepage</a>
            <a class="nav-link text-sm-left nav-link active navbar-brand" href="../../logout.php" role="button" aria-expanded="page">Logout</a>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<?php
  echo "<p>Number of products found: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Product Name: ";
     echo stripslashes($row['ProductName']);
     echo "</strong><br />Category Number: ";
     echo stripslashes($row['CategoryNum']);
     echo "<br />Price: ";
     echo "$".stripslashes($row['Price']);
     echo "<br />Product Number: ";
     echo stripslashes($row['ProductNum']);
     echo "<br />Description: ";
     echo stripslashes($row['Description']);
     echo "<br />Supplier Number: ";
     echo stripslashes($row['SellerNum']);
     echo "<br />Inventory Number: ";
     echo stripslashes($row['InventoryLevel']);
     echo "<br />";
  }
    $db->close();
?>