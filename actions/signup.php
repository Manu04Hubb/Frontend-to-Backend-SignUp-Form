<?php
include "../dbconfig/db.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $fullname = trim(htmlspecialchars($_POST['fullname']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirmpassword']);

    if(empty($fullname) || empty($email) || empty($password) || empty($confirm_password)){
        die("All fields are required.");
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("Invalid email format.");
    }
    if($password !== $confirm_password){
        die("Passwords do not match.");
    }
    if(strlen($password) < 6){
        die("Password must be at least 6 characters long.");
    }
     //hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

     //check if email already exists
     $checkQuery = "SELECT * FROM users WHERE email = :email";
     $stmt = $pdo->prepare($checkQuery);
     $stmt->bindParam(":email",$email);
        $stmt->execute();
        $email_result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($email_result > 0){
            die("Email already registered. Please use a different email.");
        }

    //insert a new user into database
    $insertQuery = "INSERT INTO users (fullname, email, password) VALUES (:fullname,:email ,:password);";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->bindParam(":fullname",$fullname);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$hashed_password);
    $stmt->execute();
    if($stmt){
        echo "User registered successfully.You can now <a href='../index.php'>login</a>.";
    }else{
        echo "Error: " . $pdo->errorInfo();
    }
    $pdo = null;
    $stmt = null;
    
}