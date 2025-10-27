<?php
require_once 'session.inc.php';
require_once 'signup_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Login System</title>
</head>
<body>
    <!-- Signup Form 
 We MUST signup first before we can login
 This is registering the user in the database
 -->
    <div id="signupForm">
        <h2>Sign Up</h2>
        <form action="signup.inc.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="userName" name="username" required><br><br>

            <label for="Password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email" required><br><br>
            
            <button type="submit" id="signupBtn">Sign Up</button>
        </form>
    </div>
    <?php
    //Display error messages if any exist in the session
    check_signup_errors();
    ?>

    <!-- Login Form 
     This is basically checking if the user exists in the database
    -And that the password and username match the ones in the database
     -->
    <div id="loginForm">
        <h2>Login</h2>
        <form action="login.inc.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <button type="submit" id="loginBtn">Login</button>
        </form>
    </div>

</body>
</html>