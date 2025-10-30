<?php
//Inside here we take user data and do something with it
declare(strict_types=1);
//Function to check for empty input fields
function is_input_empty(string $username, string $email ,string $password) {
    if(empty($username) || empty($email) || empty($password))  {
        return true;
    }else {
        return false;
    }

}
//Function to validate email format
function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        return true;
    }else {
        return false;
    }
}
//Function to check if username is already taken
function is_username_taken(object $pdo ,string $username){
    if(get_username($pdo, $username)){ 
        return true;
    }else {
        return false;
    }
}
//Function to check if email is already registered
function is_email_registered(object $pdo ,string $email){
    if(get_email($pdo ,$email)){ 
        return true;
    }else {
        return false;
    }
}

function create_user(object $pdo ,string $username, string $password, string $email){

    $options = [
      'cost' => 12 //Cost factor
    ];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT,$options);

    $query = "INSERT INTO login_system_users (user_name, user_email, user_password) 
    VALUES (:username, :password, :email);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashedPassword);
    
    $stmt->execute();
}

