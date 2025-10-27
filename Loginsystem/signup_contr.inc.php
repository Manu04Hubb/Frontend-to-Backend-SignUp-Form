<?php
declare(strict_types=1);
//Function to check for empty input fields
function is_input_empty(string $username, string $password, string $email) {
    if(empty($username) || empty($password) || empty($email)) {
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
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}

