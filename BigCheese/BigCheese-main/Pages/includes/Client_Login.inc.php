<?php

    if (isset($_POST["submit"])) {

        $email = $_POST["email"];
        $password1 = $_POST["password"];

        require_once 'dbConfig.inc.php';

        if (empty($email) || empty($password1)) {
            header("Location: ../client_login.php?error=emptyInputs");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../client_login.php?error=invalidEmail");
            exit();
        }

        $sql = "SELECT * FROM clients WHERE email_address=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../client_login.php?error=sqlerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($results)) {

            if($password1 !== $row['pass_word']) {
                header("Location: ../client_login.php?error=wrongPassword");
                exit();
            }

            session_start();
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['client_id'] = $row['client_id'];

            echo $_SESSION['first_name'];
            echo $_SESSION['last_name'];
            header("Location: ../index.php?login=success");
            exit();

        }
        else {
            header("Location: ../client_login.php?error=nouser");
            exit();
        }

    }
    else {
        header("Location: ../client_login.php?error=something");
        exit();
    }