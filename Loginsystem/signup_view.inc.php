<?php
//Displays fro the db
declare(strict_types=1);
function check_signup_errors(){
    require_once 'signup.inc.php';
    if(isset($_SESSION["errors_signup"])){
        echo "<br>";
     //require_once 'signup.inc.php';
     foreach($errors as $error){
     echo "<p class = 'form-error'> . $error . </p>";
     }

    unset($_SESSION["errors_signup"]);
        
    }else{
        echo "Signup Success!";
    }
}