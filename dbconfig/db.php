<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";
// Create connection using PDO
$pdo = new PDO("mysql:dbname=$dbname;host=$servername",$username,$password);

try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if($pdo){
        echo "Connection to database successful!";
    }else{
        echo "Connection to database unsuccessful!";
    }   
}catch(PDOException $e){
    die("Connection failed: " . $e->getMessage());
}

echo "<br>";