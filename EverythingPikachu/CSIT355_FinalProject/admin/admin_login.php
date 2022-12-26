<html>
    <head>
        <title>Admin Login</title>
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
        <h1>Please enter your admin account information</h1>
        <form action="./admin_backend/admin_login_verification.php" method="post">
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
        <form action = "../index.php" method = "post">
            <button type = "submit">Back</button>
        </form>
        <!--<p>If you do not have an account</p>-->
        <!--<a href="register.php">-->
        <!--    <button type="submit">Register Here!</button>-->
        <!--</a>-->
    </body>
</html>