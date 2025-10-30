<?php
//Only Quering and interact with database
//Type declaration add alayer of protection
declare(strict_types=1);

function get_username(object $pdo ,string $username){
 $query = "SELECT * FROM login_system_users WHERE user_name = :username;";
 $stmt = $pdo->prepare($query);//prevent sql injection
 $stmt->bindParam(":username", $username);//bind a parmeter to its placeholder
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);//fetch data as an associative array
    return $result;
}

function get_email(object $pdo ,string $email){
    $query = "SELECT * FROM login_system_users WHERE user_email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
       $stmt->execute();
       $result = $stmt->fetch(PDO::FETCH_ASSOC);
       return $result;

}