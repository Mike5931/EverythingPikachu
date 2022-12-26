<?php
    // used this header to display certain special character
    header('Content-Type: text/html; charset=ISO-8859-1'); //https://stackoverflow.com/questions/12699037/how-to-display-special-characters-in-php
    
    // gets connection to data base
    include('db_connection.php');
    
    // starts a session that validates user is logged in by username or else it will send the user to the page listed below in the if statement
    session_start();
    if($_SESSION['valid'] != true)
    {
        header("Location: index.php");
    }
    
    // creates and initializes variables to be used
    $username = $_SESSION['username'];
    $query1='';
    $query2='';
    
    $result1='';
    $result2='';
    
    $tax=1.07;
    $TotalPrice=0;
    
    // // selecting the CustID from the customer table and storing it as CustID. THis only gets the CustID per row
    $query1= "SELECT CustID FROM CUSTOMER WHERE UserName = '$username'";
    $result1 = $db->query($query1);
    $ID = $result1->fetch_assoc();
    $CustID = $ID['CustID'];
    
    // selects everything from the customer shopping cart from their customer ID and orders the product number in ascending manner from the shopping cart of the customer
    $query2= "SELECT * FROM SHOPPING_CART WHERE CustID = '$CustID' ORDER BY ProductNum ASC";
    $result2=$db->query($query2);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>
            Shopping Cart
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
        <a class="nav-link text-sm-left nav-link active navbar-brand" href="shoppingcart.php" role="button" aria-expanded="page">Shopping Cart</a>
        <a class="nav-link text-sm-left nav-link active navbar-brand" href="logout.php" role="button" aria-expanded="page">Logout</a>
    </nav>
    
        <h1>Everything Pikachu</h1>
        <h2>Shopping Cart</h2>
        <h3>Your Order:</h3>
        
        <?php
        // if their are results from the query for items in the customer's shopping cart, it displays everything
            if($result2){
                $i=0;
                foreach($result2 as $row){
                    echo $i+1 . ". " . '<label for="product">' . $row['ProductName'] . '</label>';
                    echo '</br>';
                    echo 'Product Number: ' . '<label for="productNumber">' . $row['ProductNum'] . '</label></br>';
                    echo 'Quantity: ' . '<label for="quantity">' . $row['Quantity'] . '</label></br>';
                    echo 'Total Item Price: $' . '<label for="price">' . $row['Price']*$row['Quantity'] . '</label></br>';
                    echo '</br>';
                    $num=$row['ProductNum'];
                    ?>
                    <form action="shoppingcart_remove.php" method="post">
                        <!--used hidden input to get the product number on the following page-->
                        <input type="hidden" name="ProductNum" value="<?php echo $num ?>">
                        <button type="submit">Remove item</button>
                    </form>
                    <?php
                    $i = $i+1;
                    $TotalPrice=$TotalPrice+$row['Quantity']*$row['Price'];
                }
            }
            // calculates the total price for the customer and creates a session variable for it
            $TotalPrice*$tax;
            $TotalPrice=number_format($TotalPrice,2);
            $_SESSION['Total'] = $TotalPrice;
        ?>
        <!--displays the total due of all the items with tax-->
        <p>Total due (including tax): <b>$<?php echo $TotalPrice;?></b></p>
        <form action="checkoutform.php" method="post">
            <button type="submit">Proceed to Checkout</button>
        </form>
        
        <form action="homepage.php" method="post">
            <button type="submit">Back to homepage</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<?php
    // close connection to the database
    $db->close();
?>