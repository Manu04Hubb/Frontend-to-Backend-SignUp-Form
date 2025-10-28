<?php
//Handle Registation Logic
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwd_confirm = $_POST['pwd_confirm'];
    
    require_once 'tsiregisterlogindbconnect.php'

    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter Username" required>
        <br><br>

        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Enter Email" required>
        <br><br>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter Password" required>
        <br><br>

        <label for="pwd_confirm">Confirm Password</label>
        <input type="text" name="pwd_confirm" placeholder="Confirm your password" required>
        <br><br>

        <button type="submit" >Register</button>
        <p>Already Have an account? <a href="tsilogin.php" target="_blank" rel="noopener noreferrer">Login</a></p>
    </form>
</body>
</html>