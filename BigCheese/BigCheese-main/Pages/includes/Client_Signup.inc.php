<?php

    // Makes sure the user accessed this file through the submit button
    if (isset($_POST["submit"])) {
        
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];

        echo "first name: " . $first_name;
        echo "last name: " . $last_name;
        echo "email: " . $email;
        echo "password: " . $password1;
        echo "passwordconf: " . $password2;

        require_once 'dbConfig.inc.php';
        require_once 'functions.inc.php';

        // Checking if inputs are empty
        if (emptyInputClientSignUp($first_name, $last_name, $email, $password1, $password2) !== false) {
            header("location: ../client_signup.php?error=emptyInput");
            exit();
        }

        // Invalid Email
        if (invalidEmail($email) !== false) {
            header("location: ../client_signup.php?error=invalidEmail");
            exit();
        }

        // Email exists
        if (clientEmailExists($conn, $email) !== false) {
            header("location: ../client_signup.php?error=emailTaken");
            exit();
        }

        createClient($conn, $first_name, $last_name, $email, $password1);
    }
    else {
        header("location: ../client_signup.php");
    }

