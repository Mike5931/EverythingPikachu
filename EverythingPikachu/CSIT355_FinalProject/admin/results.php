<?php
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
    header('Content-Type: text/html; charset=ISO-8859-1'); //https://stackoverflow.com/questions/12699037/how-to-display-special-characters-in-php


?>


<html>
<head>
   
  <title>Everything Pikachu Search Results</title>
        <meta charset="utf-8">
</head>
<body>
<h1>Everything Pikachu Search Results</h1>
<?php
    include("../db_connection.php");
    header('Content-Type: text/html; charset=ISO-8859-1'); //https://stackoverflow.com/questions/12699037/how-to-display-special-characters-in-php

 if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  // create short variable names
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);
  $query = '';
  $result = '';
  
  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }


 

  $query = "select Cname, Cnum, Price, ProductNum, Description, InventoryLevel, ProductName from CATEGORY, PRODUCT where ".$searchtype." like '%".$searchterm."%' AND Cnum = CategoryNum ORDER BY Cnum, ProductNum";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of products found: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Product Name: ";
     echo stripslashes($row['ProductName']);
     echo "</strong><br />Product Number: ";
     echo stripslashes($row['ProductNum']);
     echo "<br />Category Name: ";
     echo stripslashes($row['Cname']);
     echo "<br />Category Number: ";
     echo stripslashes($row['Cnum']);
     echo "<br />Description: ";
     echo stripslashes($row['Description']);
     echo "<br />Price: ";
     echo stripslashes($row['Price']);
     echo "</p>";
  }

  $result->free();
  $db->close();

?>
<a href = "product_search.php">Go Back</a>
</body>
</html>
