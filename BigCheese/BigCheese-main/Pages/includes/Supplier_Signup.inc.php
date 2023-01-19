<?php

    // Makes sure the user accessed this file through the submit button
    if (isset($_POST["submit"])) {
        
        $company_name = $_POST["company_name"];
        $company_address = $_POST["company_address"];
        $phone_number = $_POST["phone_number"];
        $email = $_POST["email"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];

        echo "company name: " . $company_name;
        echo "company address: " . $company_address;
        echo "phone number: " . $phone_number;
        echo "email: " . $email;
        echo "password: " . $password1;
        echo "passwordconf: " . $password2;

        require_once 'dbConfig.inc.php';
        require_once 'functions.inc.php';

        // Checking if inputs are empty
        if (emptyInputSupplierSignUp($company_name, $company_address, $phone_number, $email, $password1, $password2) !== false) {
            header("location: ../supplier_signup.php?error=emptyInput");
            exit();
        }

        // Invalid Email
        if (invalidEmail($email) !== false) {
            header("location: ../supplier_signup.php?error=invalidEmail");
            exit();
        }

        // Email exists
        if (supplierEmailExists($conn, $email) !== false) {
            header("location: ../supplier_signup.php?error=emailTaken");
            exit();
        }

        createSupplier($conn, $company_name, $company_address, $phone_number, $email, $password1);
    }
    else {
        header("location: ../supplier_signup.php");
    }