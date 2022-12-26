<?php
    include('../db_connection.php');
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
    
    $query = '';
    $results = '';
    
    $query = "select Fname, Lname, SellID, Email from SELLER";
    $results = $db->query($query);
?>
<html>
    <head>
        <title>Seller Lookup</title>
    </head>
    <body>
        <h1>List of Sellers on Everything Pikachu:</h1>
        <br>
        <table style = "border:1px solid black;border-spacing:0;background-color:white;">
            <tr>
                <td style = "text-align:center;"><b>First Name</b></td>
                <td style = "text-align:center;"><b>Last Name</b></td>
                <td style = "text-align:center;"><b>Seller ID</b></td>
                <td style = "text-align:center;"><b>Email</b></td>
            </tr>
            <?php
                foreach($results as $result){
                    ?>
                    <tr>
                        <td><?php echo $result['Fname']; ?></td>
                        <td><?php echo $result['Lname']; ?></td>
                        <td><?php echo $result['SellID']; ?></td>
                        <td><?php echo $result['Email']; ?></td>
                    </tr>
                <?php }?>
        </table>
        <a href = "admin_homepage.php">Go Back</a>
    </body>
</html>