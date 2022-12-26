<?php
    include('../db_connection.php');
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
    header('Content-Type: text/html; charset=ISO-8859-1'); //https://stackoverflow.com/questions/12699037/how-to-display-special-characters-in-php
    
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }
    
    $query = '';
    $query2 = '';
    
    $results = '';
    $results2 = '';
    
    $query = "SELECT * FROM ORDERS ORDER BY OrderDate DESC";
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
            if($results)
            {
                foreach($results as $row)
                {?>
                   <b> <?php echo "Order Number: " .$row['OrderNum'] ."<br>"; 
                        echo "Order Date: " .$row['OrderDate'];?> </b><?php
                    echo "<br><br>";
                    $OrderNum = $row['OrderNum'];
    
                    $query2 = "SELECT ProductName, ProductNum, Price, Quantity FROM ORDER_ITEMS WHERE OrderID = '$OrderNum'";
                    $results2 = $db->query($query2);
                    
                   if($results2)
                    {
                        foreach($results2 as $row2)
                        {
                            echo "Product Name: " .$row2['ProductName'] ."<br>";
                            echo "Product Number: " .$row2['ProductNum'] ."<br>";
                            echo "Price: $" .$row2['Price'] ." each<br>";
                            echo "Quantity: " .$row2['Quantity'] ."<br><br>";
                        }
                    }
                    
                    ?> <b> <?php 
                            echo "Customer Name: " .$row['Fname'] ." " .$row['Lname'] ."<br>";
                            echo "Customer Number: ". $row['CustomerID'] ."<br>";
                            echo "Address: " .$row['Street'] ." " .$row['City'] ." " .$row['State'] .", " .$row['Zip'] ."<br>";
                            echo "Total: $" .$row['Total']; ?> </b> <br><br><br><?php
                }
            }
        ?>
        <br>
        <br>
        <a href = "admin_homepage.php">Go Back</a>
    </body>
</html>

<?php
    $db->close();
?>