<?php
//Handle Registation Logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pwd_confirm = $_POST['pwd_confirm'];


    require_once 'tsidb_connection.php';
    //Hash users password first
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    //Verify the hased password
    $verified_password = password_verify($password, $password_hashed);
    // Runnning a prepare statement to insert userdata into the database
    $insert_query = "INSERT INTO tsi_user_registrations (user_name,user_email,user_password,pwd_confirm)
              VALUES(:user_name,:user_email,:user_password,:pwd_confirm);";
    $stmt = $pdo->prepare($insert_query);

    $stmt->bindParam(":user_name", $username);
    $stmt->bindParam(":user_email", $email);
    $stmt->bindParam(":user_password", $password_hashed);
    $stmt->bindParam(":pwd_confirm", $verified_password);

    $stmt->execute();

    $pdo = null;
    $stmt = null;
    die();
}
//

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Document</title>
    <!-- Cache busting for CSS file 
    to ensure the latest styles are loaded -
    by appending a query string with the current timestamp.
     -->
    <link rel="stylesheet" href="tstyle.css?v=<?php echo time(); ?>">
</head>

<body>
   
    <main id="userForm">
        <h2>User Registration Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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

            <button id="registerBtn" type="submit">Register</button>
            <p>Already Have an account? <a href="tsilogin.php" target="_blank" rel="noopener noreferrer">Login</a></p>
        </form>
    </main>
</body>

</html>