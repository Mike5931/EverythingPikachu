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
        exit();
    }
    
    // initialize and get the variables from the form from the previous page
    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $OrderID = '';
    $CustID = '';
    $Total = $_SESSION['Total'];
    $username = $_SESSION['username'];
    date_default_timezone_set('EST');
    $date = date('H:i, jS F Y');
    
    // initialize the queries
    $query = '';
    $query2 = '';
    $query3 = '';
    $query4 = '';
    $query5 = '';
    $query6 = '';
    
    // initialize the results of the queries
    $results = '';
    $results2 = '';
    $results3 = '';
    $results4 = '';
    $results5 = '';
    $results6 = '';
    
    $row2 = '';
    $row6 = '';
    
    // selecting the CustID from the customer table and storing it as CustID. THis only gets the CustID per row
    $query6 = "SELECT CustID FROM CUSTOMER WHERE UserName = '$username'";
    $results6 = $db->query($query6);
    $row6 = $results6->fetch_assoc();
    $CustID = $row6['CustID'];
    
    // Insert the orders with the corresponding data from the form in the order table
    $query = "INSERT INTO ORDERS (OrderDate, Total, Street, City, State, Zip, CustomerID, Fname, Lname) values ('$date', '$Total', '$address','$city','$state','$zip','$CustID','$Fname','$Lname')";
    $results=$db->query($query);
    
    // selecting the order number from the order table and storing it as OrderID. THis only gets the Order number per row
    $query2 = "SELECT OrderNum FROM ORDERS WHERE CustomerID = '$CustID' AND OrderDate = '$date'";
    $results2 = $db->query($query2);
    $row2 = $results2->fetch_assoc();
    $OrderID = $row2['OrderNum'];
    
    // Selects everything from the shopping cart of the customer by checking the customer ID
    $query3 = "SELECT * FROM SHOPPING_CART WHERE CustID = '$CustID'";
    $results3 = $db->query($query3);
    
    // if there are results to select from, it will print out all the selected results from this foreach loop with the following attributes
    if($results3){
        foreach($results3 as $row){
            $ProductName=$row['ProductName'];
            $ProductNum=$row['ProductNum'];
            $Price=$row['Price'];
            $Quantity=$row['Quantity'];
            // Inserts the items into the order_items table as a placed order table. Pretty much processing the order if the customer has items in their cart
            $query4 = "INSERT INTO ORDER_ITEMS (OrderID, ProductName, ProductNum, Price, Quantity) values ('$OrderID', '$ProductName','$ProductNum','$Price','$Quantity')";
            $results4=$db->query($query4);
        }
    }
    
    // since the order has been proceed from the shopping cart, we must clear the shoppers shopping cart by deleting what they have in it from the table
    $query5="DELETE FROM SHOPPING_CART WHERE CustID = '$CustID'";
    $results5 = $db->query($query5);
?>

<html>
    <body>
        <h1>Thank you for your purchase!</h1>
        <br>
        <br>
        <a href = "homepage.php">Back to Home</a>
    </body>
</html>

<?php
    // closes connection to the database
    $db->close();
?>