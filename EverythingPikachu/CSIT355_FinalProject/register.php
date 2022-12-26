<html>
    <head>
        <title>
            Register
        </title>
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
        <h2>Please enter the following information to register for an account:</h2>
        
        <!--form to fill out to register for an account by putting the user information in the database-->
        <form  method="post" action="./backend/registration_verification.php">
            <label>Username:</label>
            <input type="text" name="Username" id="Username" placeholder="Username" required><br>
            <br>
            <br>
            <label>Password:</label>
            <input type="password" name="Password" id="Password" placeholder="Password" required><br>
            <br>
            <label>First Name:</label>
            <input type="text" name="firstName" id="firstName" placeholder="First Name" required><br>
            <br>
            <label>Last Name:</label>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name" required><br>
            <br>
            <label>Email:</label>
            <input type="email" name="Email" id="Email" placeholder="Email" required><br>
            <br>
            <label>Address:</label>
            <input type="text" name="Address" id="Address" placeholder="Address" required><br>
            <br>
            <label>City:</label>
            <input type="text" name="City" id="City" placeholder="City" required><br>
            <br>
            <label>State:</label>
            <input type="text" name="State" id="State" placeholder="State" required><br>
            <br>
            <label>Zip Code:</label>
            <input type="num" name="zipCode" id="zipCode" placeholder="Zip Code" required><br>
            <br>
            <label>Phone Number:</label>
            <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" required><br>
            <br>
            <button type="submit">Submit</button>
            <button type="reset">Clear</button>
        </form>
        
        <!--go back button-->
        <form action = "index.php" method = "post">
            <button type = "submit">Back</button>
        </form>
        
    </body>
</html>