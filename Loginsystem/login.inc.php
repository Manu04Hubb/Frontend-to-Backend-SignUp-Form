<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['usename'];
    $pwd = $_POST['password'];
}else{
    header("Location: frontpagefile.php")
}