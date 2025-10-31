<?php
  //To Handle Delete Logic
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $delete_query = "DELETE * FROM tsi_user_registrations 
    WHERE user_name = :user_name AND user_email = :user_email;";

    $stmt->bindParam(":user_name",$username);
    $stmt->bindParam("user_email",$email);

    $stmt = $pdo->excecute();
     $pdo = null;
    $stmt = null;
    die();
    }