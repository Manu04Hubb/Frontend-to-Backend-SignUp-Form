<?php
//handle Login Logic just verify user credentials

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  $login_username = $_POST['login_username'];
  $login_password = $_POST['login_password'];

  require_once 'tsidb_connection.php';
  

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

}else{
  //header("Location:tsiregister_profile.php");
 // die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <label for="Username">Username</label>
        <input type="text" name="login_username" placeholder="Enter Username" required>
        <br><br>
        <label for="Password">Password</label>
        <input type="password" name="login_password" placeholder="Enter Password" required><br><br>

        <button type="submit" >Login</button>
    </form>
</body>
</html>