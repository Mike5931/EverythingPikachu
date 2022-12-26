<?php
    // gets connection to data base
    include('db_connection.php');
    
    // starts a session that validates user is logged in by username or else it will send the user to the page listed below in the if statement
    session_start();
    if($_SESSION['valid'] != true)
    {
        header("Location: index.php");
    }
    
    // used this header to display certain special character
    header('Content-Type: text/html; charset=ISO-8859-1'); //https://stackoverflow.com/questions/12699037/how-to-display-special-characters-in-php

    // creates a username session variable
    $username = $_SESSION['username'];
    
    // code used to displays errors that occur
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // checks to validate connection to the database
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }
    
    // queries used to select the products from the certain category
    $query1 = 'SELECT * FROM PRODUCT WHERE CategoryNum = 1';
    $result1=$db->query($query1);
    
    $query2 = 'SELECT * FROM PRODUCT WHERE CategoryNum = 2';
    $result2=$db->query($query2);
    
    $query3 = 'SELECT * FROM PRODUCT WHERE CategoryNum = 3';
    $result3=$db->query($query3);
    
    $query4 = 'SELECT * FROM PRODUCT WHERE CategoryNum = 4';
    $result4=$db->query($query4);
    
    $query5 = 'SELECT * FROM PRODUCT WHERE CategoryNum = 5';
    $result5=$db->query($query5);
    
    $query6 = 'SELECT * FROM PRODUCT WHERE CategoryNum = 6';
    $result6=$db->query($query6);
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
        <!--navbar to display and keep everything organized for the users-->
        <nav class="nav sticky-top nav-pills justify-content navbar navbar-dark bg-secondary">
            <div class="text-sm-center nav-link m-2 active navbar-brand">Welcome back <?php echo $username;?></div>
            
        <div class="dropdown">
          <a class="btn btn-primary dropdown-toggle navbar-brand" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
        
          <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#shirts">Explore Shirts</a></li>
            <li><a class="dropdown-item" href="#hoodies">Explore Hoodies/Jackets</a></li>
            <li><a class="dropdown-item" href="#hats">Explore Hats</a></li>
            <li><a class="dropdown-item" href="#plushies">Explore Plushies</a></li>
            <li><a class="dropdown-item" href="#accessories">Explore Accessories</a></li>
            <li><a class="dropdown-item" href="#pants">Explore Pants</a></li>
          </ul>
        </div>
        <a class="nav-link text-sm-left nav-link active navbar-brand" href="view_orders_customer.php" role="button" aria-expanded="page">Previous Orders</a>
        <a class="nav-link text-sm-left nav-link active navbar-brand" href="shoppingcart.php" role="button" aria-expanded="page">Shopping Cart</a>
        <a class="nav-link text-sm-left nav-link active navbar-brand" href="logout.php" role="button" aria-expanded="page">Logout</a>
    </nav>
    <br>
        <h3>Browse through our collection of pikachu products including apperal, plushies, and more!</h3>
        <br>
        <div style="border: thin solid blue;"></div>
        <!--Category 1 = T-shirts-->
        <h3 id="shirts">Explore our Shirts</h3>
        <?php
        // used to display the first query
            if($result1){
                $i = 0;
                $count = 0;
                foreach($result1 as $row){
                    echo '<div style="border: thin solid blue;">';
                    echo '</br>';
                    echo $i+1 . ". " . '<label for="product">' . $row['ProductName'] . '</label>';
                    echo '</br>';
                    // echo "<img src='".$row['ImageLink']."' width=250px height=250px alt=Pikachu T-Shit>"; //https://wlearnsmart.com/display-image-in-php-from-folder-directory/
                    // echo '</br>';
                    echo '$' . '<label for="price">' . $row['Price'] . '</label>';
                    echo '</br>';
                    echo 'Description: ' . '<label for="description">' . $row['Description'] . '</label></br>';
                    echo 'Quantity left: ' . '<label for="quantityLeft">' . $row['InventoryLevel'] . '</label></br>';
                    echo '<form action = "shoppingcart_redirect.php" method = "post">'; ?>
                    <!--used hidden input to get the product name on the following page-->
                    <input type = "hidden" name = "action" value = "add_to_cart"> 
                    <input type = "hidden" name = "ProductName" value = "<?php echo $row['ProductName']; ?>">
                    <?php
                    echo '<button type = "submit">Add item to cart</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</br>';
                    $i = $i+1;
                }
            }
        ?>
        <!--Category 2 = Hoodies/Jackets-->
        <h3 id="hoodies">Explore our Hoodies/Jackets</h3>
        <?php
        // used to display the second query
            if($result2){
                $i = 0;
                $count = 0;
                foreach($result2 as $row){
                    echo '<form action="shoppingcart_redirect.php" method="post">';
                    echo '<div style="border: thin solid blue;">';
                    echo '</br>';
                    echo $i+1 . ". " . '<label for="product">' . $row['ProductName'] . '</label>';
                    echo '</br>';
                    // echo "<img src='".$row['ImageLink']."' width=250px height=250px alt=Pikachu Hoodie/Jacket>"; //https://wlearnsmart.com/display-image-in-php-from-folder-directory/
                    // echo '</br>';
                    echo '$' . '<label for="price">' . $row['Price'] . '</label>';
                    echo '</br>';
                    echo 'Description: ' . '<label for="description">' . $row['Description'] . '</label></br>';
                    echo 'Quantity left: ' . '<label for="quantityLeft">' . $row['InventoryLevel'] . '</label></br>';
                    echo '<form action = "shoppingcart_redirect.php" method = "post">'; ?>
                    <!--used hidden input to get the product name on the following page-->
                    <input type = "hidden" name = "action" value = "add_to_cart"> 
                    <input type = "hidden" name = "ProductName" value = "<?php echo $row['ProductName']; ?>">
                    <?php
                    echo '<button type = "submit">Add item to cart</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</br>';
                    $i = $i+1;
                }
            }
        ?>
        
        <!--Category 3 = Hats-->
        <h3 id="hats">Explore our Hats</h3>
        <?php
        // used to display the third query
            if($result3){
                $i = 0;
                $count = 0;
                foreach($result3 as $row){
                    echo '<div style="border: thin solid blue;">';
                    echo '</br>';
                    echo $i+1 . ". " . '<label for="product">' . $row['ProductName'] . '</label>';
                    echo '</br>';
                    // echo "<img src='".$row['ImageLink']."' width=250px height=250px alt=Pikachu Hat>"; //https://wlearnsmart.com/display-image-in-php-from-folder-directory/
                    // echo '</br>';
                    echo '$' . '<label for="price">' . $row['Price'] . '</label>';
                    echo '</br>';
                    echo 'Description: ' . '<label for="description">' . $row['Description'] . '</label></br>';
                    echo 'Quantity left: ' . '<label for="quantityLeft">' . $row['InventoryLevel'] . '</label></br>';
                    echo '<form action = "shoppingcart_redirect.php" method = "post">'; ?>
                    <!--used hidden input to get the product name on the following page-->
                    <input type = "hidden" name = "action" value = "add_to_cart"> 
                    <input type = "hidden" name = "ProductName" value = "<?php echo $row['ProductName']; ?>">
                    <?php
                    echo '<button type = "submit">Add item to cart</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</br>';
                    $i = $i+1;
                }
            }
        ?>
        
        <!--Category 4 = Plushies-->
        <h3 id="plushies">Explore our Plushies</h3>
        <?php
        // used to display the fourth query
            if($result4){
                $i = 0;
                $count = 0;
                foreach($result4 as $row){
                    echo '<div style="border: thin solid blue;">';
                    echo '</br>';
                    echo $i+1 . ". " . '<label for="product">' . $row['ProductName'] . '</label>';
                    echo '</br>';
                    // echo "<img src='".$row['ImageLink']."' width=250px height=250px alt=Pikachu Plushie>"; //https://wlearnsmart.com/display-image-in-php-from-folder-directory/
                    // echo '</br>';
                    echo '$' . '<label for="price">' . $row['Price'] . '</label>';
                    echo '</br>';
                    echo 'Description: ' . '<label for="description">' . $row['Description'] . '</label></br>';
                    echo 'Quantity left: ' . '<label for="quantityLeft">' . $row['InventoryLevel'] . '</label></br>';
                    echo '<form action = "shoppingcart_redirect.php" method = "post">'; ?>
                    <!--used hidden input to get the product name on the following page-->
                    <input type = "hidden" name = "action" value = "add_to_cart"> 
                    <input type = "hidden" name = "ProductName" value = "<?php echo $row['ProductName']; ?>">
                    <?php
                    echo '<button type = "submit">Add item to cart</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</br>';
                    $i = $i+1;
                }
            }
        ?>
        
        <!--Category 5 = Accessories-->
        <h3 id="accessories">Explore our Accessories</h3>
        <?php
        // used to display the fifth query
            if($result5){
                $i = 0;
                $count = 0;
                foreach($result5 as $row){
                    echo '<div style="border: thin solid blue;">';
                    echo '</br>';
                    echo $i+1 . ". " . '<label for="product">' . $row['ProductName'] . '</label>';
                    echo '</br>';
                    // echo "<img src='".$row['ImageLink']."' width=250px height=250px alt=Pikachu Accessories>"; //https://wlearnsmart.com/display-image-in-php-from-folder-directory/
                    // echo '</br>';
                    echo '$' . '<label for="price">' . $row['Price'] . '</label>';
                    echo '</br>';
                    echo 'Description: ' . '<label for="description">' . $row['Description'] . '</label></br>';
                    echo 'Quantity left: ' . '<label for="quantityLeft">' . $row['InventoryLevel'] . '</label></br>';
                    echo '<form action = "shoppingcart_redirect.php" method = "post">'; ?>
                    <!--used hidden input to get the product name on the following page-->
                    <input type = "hidden" name = "action" value = "add_to_cart"> 
                    <input type = "hidden" name = "ProductName" value = "<?php echo $row['ProductName']; ?>">
                    <?php
                    echo '<button type = "submit">Add item to cart</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</br>';
                    $i = $i+1;
                }
            }
        ?>
        
        <!--Category 6 = Pants-->
        <h3 id="pants">Explore our Pants</h3>
        <?php
        // used to display the sixth query
            if($result6){
                $i = 0;
                $count = 0;
                foreach($result6 as $row){
                    echo '<div style="border: thin solid blue;">';
                    echo '</br>';
                    echo $i+1 . ". " . '<label for="product">' . $row['ProductName'] . '</label>';
                    echo '</br>';
                    // echo "<img src='".$row['ImageLink']."' width=250px height=250px alt=Pikachu Pants>"; //https://wlearnsmart.com/display-image-in-php-from-folder-directory/
                    // echo '</br>';
                    echo '$' . '<label for="price">' . $row['Price'] . '</label>';
                    echo '</br>';
                    echo 'Description: ' . '<label for="description">' . $row['Description'] . '</label></br>';
                    echo 'Quantity left: ' . '<label for="quantityLeft">' . $row['InventoryLevel'] . '</label></br>';
                    echo '<form action = "shoppingcart_redirect.php" method = "post">'; ?>
                    <!--used hidden input to get the product name on the following page-->
                    <input type = "hidden" name = "action" value = "add_to_cart"> 
                    <input type = "hidden" name = "ProductName" value = "<?php echo $row['ProductName']; ?>">
                    <?php
                    echo '<button type = "submit">Add item to cart</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</br>';
                    $i = $i+1;
                }
            }
        ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php 
            // close connection to database
            $db->close();
        ?>
    </body>
</html>