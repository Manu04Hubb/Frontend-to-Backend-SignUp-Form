<?php
if($_SERVER['REQUEST_METHOD' === 'POST']){
//Handle Update Logic
    $update_query = "UPDATE tsi_user_registrations SET 
    user_name=:user_name,user_email:user_email,user_password:user_password; WHERE user_id=:user_id";

    $stmt = $pdo->prepare($update_query);

    $stmt->bindParam(":user_name",$username);
    $stmt->bindParam(":user_email",$email);
    $stmt->bindParam(":user_password",$password);

    $stmt->excecute();

    $pdo = null;
    $stmt = null;
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Credentials</title>
</head>
<body>
    
</body>
</html>



