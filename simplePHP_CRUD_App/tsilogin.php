<?php
//handle Login Logic just verify user credentials

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  $login_username = $_POST['login_username'];
  $login_password = $_POST['login_password'];

  require_once 'tsidb_connection.php';
  //Fetch user data from the database to verify login credentials
  $fetch_query = "SELECT user_name,user_password FROM tsi_user_registrations
                  WHERE user_name = :user_name LIMIT 1;";
  $stmt = $pdo->prepare($fetch_query);
  $stmt->bindParam(":user_name",$login_username);
  $stmt->execute();
  $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
  $pdo = null;
  $stmt = null;
  $username = $user_data['user_name'];
  $hashed_password = $user_data['user_password'];
  //Verify the password
  $verified_password = password_verify($login_password,$hashed_password);

  //Check if username and password match
  if($login_username !== $username){
    echo "Enter your original username";
  }else{
    echo "Welcome back";
  }
  if($login_password !== $verified_password){
    echo "it seems you forgot your password,try again";
  }else{
    echo "Welcome back";
  }

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