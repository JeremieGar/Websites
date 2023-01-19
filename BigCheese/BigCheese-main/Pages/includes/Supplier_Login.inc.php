<?php

    if (isset($_POST["submit"])) {

        $email = $_POST["email"];
        $password1 = $_POST["password"];

        require_once 'dbConfig.inc.php';

        if (empty($email) || empty($password1)) {
            header("Location: ../supplierLogin.php?error=emptyInputs");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../supplierLogin.php?error=invalidEmail");
            exit();
        }

        $sql = "SELECT * FROM suppliers WHERE email_address=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../supplierLogin.php?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($results)) {

            if($password1 !== $row['pass_word']) {
                header("Location: ../supplierLogin.php?error=wrongPassword");
                exit();
            }

            session_start();
            $_SESSION['company_name'] = $row['company_name'];
            $_SESSION['supplier_id'] = $row['supplier_id'];
            header("Location: ../supplier_products.php?login=success");
            exit();

        }
        else {
            header("Location: ../supplierLogin.php?error=nouser");
            exit();
        }

    }
    else {
        header("Location: ../supplierLogin.php?error=something");
        exit();
    }