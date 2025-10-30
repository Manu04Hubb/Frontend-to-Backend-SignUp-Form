<?php
declare(strict_types=1);

function check_signup_errors() {
    if (isset($_SESSION["errors_signup"]) && !empty($_SESSION["errors_signup"])) {
        echo "<br>";
        
        // Use the session data directly
        $errors = $_SESSION["errors_signup"];
        
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }

        // Clear errors after displaying
        unset($_SESSION["errors_signup"]);
        
    } else {
        echo "<p>Signup Success!</p>";
    }
}