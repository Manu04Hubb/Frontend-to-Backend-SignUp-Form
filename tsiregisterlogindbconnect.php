<?php
$dbname = 'tsidb_Registration';
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = '';

$pdo = new PDO("mysql:dbname=$dbname;servername=$servername",$dbusername,$dbpassword);

if(!$pdo){
  echo "Connection to database unsuccessful!";
}else{
   echo "Connection to database successful!";
}

/*
-- Can also use try catch block instead of else if statement
try{
$pdo = new PDO("mysql:dbname=$dbname;servername=$servername",$dbusername,$dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
die("Not connected to database" . $e->getMessage());
}
*/