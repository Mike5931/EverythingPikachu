<?php
    // this page establishes connection to the database 
    $db = new mysqli('localhost', 'abbondm1_initial', 'P@$$w0rd123', 'abbondm1_Project'); // db connection = ('localhost', adminusername, adminpassword, databasename)
    
    // initialize the databse connection as variables
    $adminUserName = 'abbondm1_initial';
    $adminPassword = 'P@$$w0rd123';
    $adminPassword = password_hash($adminPassword, PASSWORD_DEFAULT); // hash/encrypt the admin password
    
    // checks to validate connection to the database
    if (mysqli_connect_errno())
    {
        echo 'Error: Could not connect to database. Please try again later.';
    }
?>