<?php 
require_once 'dbconfig/db.php';
$user = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){

   if(isset($_POST['fetch']) && $_POST['fetch'] === 'fetch-user'){
    //Fetch a user from the db for editing
     $id = $_POST['id'];
     $fetch_query = "SELECT * FROM users WHERE id = :id;";
     $stmt = $pdo->prepare($fetch_query);
     $stmt->bindParam(":id",$id);
     $stmt->execute();
     $user = $stmt->fetch(PDO::FETCH_ASSOC);

     //Kill the fetch if user is not found
     if(!$user){
        die("Unknown User!");
     }
   }elseif( isset($_POST['update']) && $_POST['update'] === 'update-user'){
    //The cost factor
    $option = [
        'cost' => 12
    ];
       $id = trim($_POST['id']);
       $password = password_hash(trim($_POST['password']),PASSWORD_DEFAULT,$option);
       $fullname = $_POST['full-name'];

       //The actual updaye query now
       $update_query = "UPDATE users SET fullname = :fullname,password = :password WHERE id = :id;";
       $stmt = $pdo->prepare($update_query);
       $stmt->bindParam(":id",$id);
       $stmt->bindParam(":fullname",$fullname);
       $stmt->bindParam(":password",$password);
       $stmt->execute();

       $pdo = null;
       $stmt = null;

   }else{
    die("Error try again!");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Update user</title>
</head>
<body>
    <h1>Updated Fullname and Password</h1>
    <?php if(!empty($user)) :?>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ;?>" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
        <input type="hidden" name="update" value="update-user">
        <input type="text" name="full-name" placeholder="Correct typo in fullname">
        <input type="password" name="password" placeholder="New password">
        <button type="submit">Update</button>
    </form>
    <?php endif; ?>
</body>
</html>