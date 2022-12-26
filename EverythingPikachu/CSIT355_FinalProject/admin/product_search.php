<?php
    session_start();
    
    if($_SESSION['valid'] != true)
    {
        header("Location: admin_login.php");
    }
?>


<html>
<head>
  <title>Everything Pikachu Catalog Search</title>
</head>

<body>
  <h1>Everything Pikachu Catalog Search</h1>

  <form action="results.php" method="post">
    Choose Search Type:
    <br>
    <br>
    <select name="searchtype">
      <option value="ProductNum">Product Number
      <option value="ProductName">Product Name
      <option value="SellerNum">Seller Number
    </select>
    <br>
    <br>
    Enter Search Term:<br>
    <input name="searchterm" type="text" size="40">
    <br>
    <br>
    <input type="submit" name="submit" value="Search">
  </form>
    <a href = "admin_homepage.php">Go Back</a>
</body>
</html>