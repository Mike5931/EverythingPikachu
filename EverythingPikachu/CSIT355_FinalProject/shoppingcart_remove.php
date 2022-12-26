<?php
    // gets connection to data base
    include('db_connection.php');
    
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
    
    // checks to validate connection to the database
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }
    
    // creates and initializes variables to be used
    $ProductNum=$_POST['ProductNum'];
    $username=$_SESSION['username'];
    $query='';
    $query3='';
    $query4='';
    $query5='';
    $query6='';
    
    $result='';
    $result3='';
    $result4='';
    $result5='';
    $result6='';
    
    // selecting the CustID from the customer table and storing it as CustID. THis only gets the CustID per row
    $query="SELECT CustID FROM CUSTOMER WHERE UserName = '$username'";
    $result=$db->query($query);
    $ID=$result->fetch_assoc();
    $CustID=$ID['CustID'];
    
    // selects inventory level from product table of the product number
    $query3="SELECT InventoryLevel FROM PRODUCT WHERE ProductNum = '$ProductNum'";
    $result3=$db->query($query3);
    $row=$result3->fetch_assoc();
    $inventorylevel=$row['InventoryLevel'];
    
    // selects the quantity from the shopping cart table by checking where the product number is equal to the product number and the customer id is equal to the customer id
    $query5="SELECT Quantity FROM SHOPPING_CART WHERE ProductNum = '$ProductNum' AND CustID = '$CustID'";
    $result5=$db->query($query5);
    $inventorynum=$result5->fetch_assoc();
    $quantity=$inventorynum['Quantity'];
    
    // delete the product number from the shopping cart table for the user by checking the customer id
    $query4="DELETE FROM SHOPPING_CART WHERE ProductNum = '$ProductNum' AND CustID = '$CustID'";
    $result4=$db->query($query4);
    
    // calculates the total quantity after removed from the cart
    $RemovedQuantity=$inventorylevel+$quantity;
    
    // updates the inventory level from the product by checking the product number to increase the inventory level to once the shopping cart is cleared. These products are back to the product table
    $query6="UPDATE PRODUCT SET InventoryLevel = '$RemovedQuantity' WHERE ProductNum = '$ProductNum'";
    $result6=$db->query($query6);

    // redirects the user back to the users shopping cart
    header("Location: shoppingcart.php");

    $db->close();
?>