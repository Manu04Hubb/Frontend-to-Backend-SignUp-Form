<?php 
   require_once 'dbconfig/db.php';
 if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) && $_POST['delete'] === 'delete-fullname'){
   $id = $_POST['id'];
   $delete_query = "DELETE FROM users WHERE id = :id;";
   $stmt = $pdo->prepare($delete_query);
   $stmt->bindParam(":id",$id);
   $stmt->execute();
   echo "<br>";
   echo "User id $id has been deleted";
   die();
 }