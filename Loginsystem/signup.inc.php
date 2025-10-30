<?php
//checks if user really accesed the page via the signup form not directly via url
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Try catch block to handle exceptions during database operations
    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //Error Handling
        $errors = [];//Stores key value errors as associative array
        //check for empty input fields
        if (is_input_empty($username, $password, $email)) {
            $errors["empty_inputs"] = "Fill in all fields!";
        }

        //check for invalid email format
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email format!";
        }
        //check if username is already taken
        if (get_username($pdo, $username)) {
            $errors["username_taken"] = "Username is already taken!";
        }
        //check if email is already registered
        if (get_email($pdo, $email)) {
            $errors["email_registered"] = "Email is already registered!";
            die();
        }

         //access session start through the file
        require_once 'session.inc.php';
        //if there are errors, redirect back to signup page with error messages
        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: index.php");
            die();
        }
        create_user($pdo ,$username,$password, $email);
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    };
} //else {
   // header("Location: index.php");
    // can use two dots mean go back one directory level
   // die();
//}