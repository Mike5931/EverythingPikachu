<?php
    // gets connection to data base
    include ('db_connection.php');
    
    // starts a session that validates user is logged in by username or else it will send the user to the page listed below in the if statement
    session_start();
    if($_SESSION['valid'] != true)
    {
        header("Location: index.php");
    }
    
    // code used to displays errors that occur
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // creates and initializes variables to be used
    $product=$_POST['ProductName'];
    $UserName = $_SESSION['username'];
    $tempQuantity = NULL;
    $Quantity = 0;
    $CustID = 0;
    $Price = 0.0;
    $query = '';
    $query2 = '';
    $query3 = '';
    $query4 = '';
    $query5 = '';
    $query6 = '';
    $query7 = '';
    $query8 = '';
    
    $results = '';
    $results2 = '';
    $results3 = '';
    $results4 = '';
    $results5 = '';
    $results6 = '';
    $results7 = '';
    $results8 = '';
    
    // selecting the inventory level from the product table and storing it as $inventory. This only gets the inventory level per row
    $query = "SELECT InventoryLevel from PRODUCT WHERE ProductName = '$product'";
    $results = $db->query($query);
    $row = $results->fetch_assoc();
    $inventory = $row['InventoryLevel'];
    $inventory--;
    
    // updates the inventory level to match the total number of quantity in the database 
    $query2 = "UPDATE PRODUCT SET InventoryLevel = '$inventory' WHERE ProductName = '$product'";
    $results2 = $db->query($query2);
    
    // selects the customer ID from the customer table of the user session
    $query3 = "SELECT CustID from CUSTOMER WHERE UserName = '$UserName'";
    $results3 = $db->query($query3);
    $ID = $results3->fetch_assoc();
    $CustID = $ID['CustID'];
    $_SESSION['CustID'] = $CustID;
    
    // selects the product number from the Product of checking where the product name is the vairbale of the product name
    $query4 = "SELECT ProductNum from PRODUCT WHERE ProductName = '$product'";
    $results4 = $db->query($query4);
    $num = $results4->fetch_assoc();
    $ProductNum = $num['ProductNum'];
    
    // selects the price from the product table of the product number and stores that specific price per row
    $query7 = "SELECT Price from PRODUCT WHERE ProductNum = '$ProductNum'";
    $results7 = $db->query($query7);
    $tempPrice = $results7->fetch_assoc();
    $Price = $tempPrice['Price'];
    
    // selects the quantity from the shopping cart table by checking where the product number and the customer ID are equal to each other and stores the quantity per row
    $query8 = "SELECT Quantity from SHOPPING_CART WHERE ProductNum = '$ProductNum' AND CustID = '$CustID'";
    $results8 = $db->query($query8);
    $number = $results8->fetch_assoc();
    $tempQuantity = $number['Quantity'];
    
    // checks to see if the temporary quantity is set
    if(isset($tempQuantity))
    {
        // updates the users shopping cart if they have a quantity of the item 
        $Quantity = $tempQuantity + 1;
        $query6 = "UPDATE SHOPPING_CART SET Quantity = '$Quantity' WHERE ProductName = '$product' AND CustID = '$CustID'";
        $results6 = $db->query($query6);
        unset($tempQuantity); // then unsets the temporary variable
    }
    
    // else it adds one to the quantity in the users shopping cart
    else
    {
        $Quantity = 1;
        $query6 = "INSERT INTO SHOPPING_CART (CustID, ProductName, ProductNum, Quantity, Price) values('$CustID', '$product', '$ProductNum','$Quantity', '$Price')";
        $results6 = $db->query($query6);
    } 
    
    
    // redirects user back to the shopping homepage
    header("Location: homepage.php");
    
?>



<?php
    $db->close();
?>