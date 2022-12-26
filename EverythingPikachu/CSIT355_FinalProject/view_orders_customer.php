<?php
    // gets connection to data base
    include('db_connection.php');
    
    // starts a session that validates user is logged in by username or else it will send the user to the page listed below in the if statement
    session_start();
    if($_SESSION['valid'] != true)
    {
        header("Location: employee_login.php");
    }
    header('Content-Type: text/html; charset=ISO-8859-1'); //https://stackoverflow.com/questions/12699037/how-to-display-special-characters-in-php
    
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
    $username = $_SESSION['username'];
    
    $query = '';
    $query2 = '';
    $query3 = '';
    
    $results = '';
    $results2 = '';
    $results3 = '';
    
    // selecting the CustID from the customer table and storing it as CustID. THis only gets the CustID per row
    $query3 = "SELECT CustID from CUSTOMER WHERE UserName = '$username'";
    $cust = $db->query($query3);
    $results3 = $cust->fetch_assoc();
    $CustID = $results3['CustID'];
    
    // selecting everything from the order table and ordering by date by checking where the customer id is equal
    $query = "SELECT * FROM ORDERS WHERE CustomerID = '$CustID' ORDER BY OrderDate DESC";
    $results = $db->query($query);
    
    
?>

<html>
    <head>
        <meta charset = "utf-8">
        <title>View Orders</title>
    </head>
    <body>
        <h1>Orders: </h1>
        <br>
        <?php
            // if the query has results
            if($results)
            {
                // displays each order for the customer for the customer to see previous orders
                foreach($results as $row)
                {?>
                   <b> <?php echo "Order Number: " .$row['OrderNum'] ."<br>"; 
                        echo "Order Date: " .$row['OrderDate'];?> </b><?php
                    echo "<br><br>";
                    $OrderNum = $row['OrderNum'];
                    
                    // selects the following attributes from the order_items table by matching the order id with the order number for the customer
                    $query2 = "SELECT ProductName, ProductNum, Price, Quantity FROM ORDER_ITEMS WHERE OrderID = '$OrderNum'";
                    $results2 = $db->query($query2);
                    
                   if($results2)
                    {
                        // displays the following for the previous order of the customer
                        foreach($results2 as $row2)
                        {
                            echo "Product Name: " .$row2['ProductName'] ."<br>";
                            echo "Product Number: " .$row2['ProductNum'] ."<br>";
                            echo "Price: $" .$row2['Price'] ." each<br>";
                            echo "Quantity: " .$row2['Quantity'] ."<br><br>";
                        }
                    }
                    
                }
            }
        ?>
        <br>
        <br>
        <a href = "homepage.php">Go Back</a>
    </body>
</html>

<?php
    $db->close();
?>