<?php
//handle Login Logic just verify user credentials
//Start session to manage user login state
//
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $login_username = $_POST['login_username'];
  $login_password = $_POST['login_password'];

  require_once 'tsidb_connection.php';
  //Fetch user data from the database to verify login credentials
  $fetch_query = "SELECT user_name,user_password FROM tsi_user_registrations
                  WHERE user_name = :user_name LIMIT 1;";

  $stmt = $pdo->prepare($fetch_query);
  $stmt->bindParam(":user_name", $login_username);
  $stmt->execute();

  //Fetch the user data
  $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$user_data) {
    echo "User not found! Please register first.";
    die();
  }

//Verify the password
  if (password_verify($login_password, $user_data['user_password'])) {
    /*Password is correct, set session variables
      This enalbles the browser to remember the user across different pages
      during the session
    */
    $_SESSION['username'] = $user_data['user_name'];
    echo "Welcome back, {$user_data['user_name']}!";
  } else {
    echo "Invalid password! Please try again.";
  }

  $pdo = null;
  $stmt = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="tstyle.css?v=<?php echo time(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Document</title>
</head>
<body>
  <div id="loginForm">
    <h2>User Login Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <label for="Username">Username</label>
        <input type="text" name="login_username" placeholder="Enter Username" required>
        <br><br>
        <label for="Password">Password</label>
        <input type="password" name="login_password" placeholder="Enter Password" required><br><br>

        <button id="loginBtn" type="submit" >Login</button>
    </form>
  </div>
</body>
</html>