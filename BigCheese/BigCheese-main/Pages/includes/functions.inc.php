<?php

function emptyInputClientSignUp($first_name, $last_name, $email, $password1, $password2) {
    
    $result = false;
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password1) || empty($password2)) {
        $result = true;
    }
    return $result;
}

function emptyInputSupplierSignUp($company_name, $company_address, $phone_number, $email, $password1, $password2) {
    
    $result = false;
    if (empty($company_name) || empty($company_address) || empty($phone_number) || empty($email) || empty($password1) || empty($password2)) {
        $result = true;
    }
    return $result;
}

function invalidEmail($email) {

    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    return $result;
}

function clientEmailExists($conn, $email) {

    $sql = "SELECT * FROM clients WHERE email_address = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../client_signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultsData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function supplierEmailExists($conn, $email) {

    $sql = "SELECT * FROM suppliers WHERE email_address = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../supplier_signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultsData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createClient($conn, $first_name, $last_name, $email, $password) {

    $sql = "INSERT INTO clients (first_name, last_name, email_address, pass_word) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../client_signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../client_signup.php?error=none");
    exit();
}

function createSupplier($conn, $company_name, $company_address, $phone_number, $email, $password) {

    $sql = "INSERT INTO suppliers (company_name, email_address, pass_word, company_address, phone_number) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../supplier_signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $company_name, $email, $password, $company_address, $phone_number);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../supplier_signup.php?error=none");
    exit();
}

