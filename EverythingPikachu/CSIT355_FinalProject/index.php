<html>
    <head>
        <title>Login</title>
        <style type = "text/css">
            label {
                width : 125px;
                display: inline-block;
            }
            textarea{
                
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <h1>Please enter your account information</h1>
        
        <!--regular login if you have an account-->
        <form action="./backend/login_verification.php" method="post">
            <label>Username:</label>
            <input type="text" name="Username" id="Username" placeholder="Username" required>
            <br>
            <br>
            <label>Password:</label>
            <input type="password" name="Password" id="Password" placeholder="Password" required>
            <br>
            <button type="submit">Submit</button>
            <button type="reset">Clear</button>
        </form>
        
        <p>If you do not have an account</p>
        <!--register for an account redirect page-->
        <a href="register.php">
            <button type="submit">Register Here</button>
        </a><br>
        
        
        <p>Employee Login below</p>
        <!--employee login redirect page-->
        <a href="./employee/employee_login.php">
            <button type="submit">Employee Login</button>
        </a><br>
        
        
        <p>Seller Login below</p>
        <!--seller login redirct page-->
        <a href="./seller/seller_login.php">
            <button type="submit">Seller Login</button>
        </a><br>
        
        
        <p>Admin Login below</p>
        <!--admin login redirect page-->
        <a href="./admin/admin_login.php">
            <button type="submit">Admin Login</button>
        </a>
    </body>
</html>