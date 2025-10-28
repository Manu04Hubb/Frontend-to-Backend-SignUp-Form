<?php
$dbname = 'tsidb_Registration';
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = '';

try{
$pdo = new PDO("mysql:dbname=$dbname,servername=$servername",$dbusername,$dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
die("Not connected to database" . $e->getMessage());
}