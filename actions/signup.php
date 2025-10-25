<?php
include "../dbconfig/db.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
     $checkQuery = "SELECT * FROM users WHERE email = ?";
     $stmt = mysqli_prepare($conn,$checkQuery);
     mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            die("Email already registered. Please use a different email.");
        }

    //insert a new user into database
    $insertQuery = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn,$insertQuery);
    mysqli_stmt_bind_param($stmt,"sss",$fullname,$email,$hashed_password);
    if(mysqli_stmt_execute($stmt)){
        echo "User registered successfully.You can now <a href='../index.php'>login</a>.";
    }else{
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}