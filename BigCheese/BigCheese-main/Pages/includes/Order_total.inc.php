<?php

    include_once 'dbConfig.inc.php';
    session_start();
    // Makes sure the user accessed this file through the submit button
    if (isset($_POST["order_submit"])) {
        $company_name = $_POST["company_name"];
        $product_name = $_POST["product_name"];
        $product_quantity = $_POST["order_quantity"];
        $product_quantity_available = $_POST["product_quantity_available"];
        $product_price = $_POST["product_price"];

        $order_total = 0;
        for ($i=0; $i < count($product_name); $i++) {
            $order_total += ((int)$product_quantity[$i] * (int)$product_price[$i]);
        }

        $sql1 = "INSERT INTO orders (client_id, order_date, order_total) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql1)) {
            header("location: ../index.php?error=stmt1failed");
            exit();
        }
        
        $clientID = $_SESSION["client_id"];
        $today = date("j-m-Y");

        mysqli_stmt_bind_param($stmt, "sss",  $clientID, $today, $order_total);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $last_id = mysqli_insert_id($conn);

        $sql2 = "SELECT supplier_id FROM suppliers WHERE company_name='$company_name[0]';";
        $result2 = mysqli_query($conn, $sql2);
        
        $supplier_id = "";
        $product_ids = [];
        
        while($row = mysqli_fetch_assoc($result2)) {
            $supplier_id = $row["supplier_id"];
        }

        for ($i=0; $i < count($product_name); $i++) { 
            $sql3 = "SELECT product_id FROM products WHERE supplier_id=$supplier_id AND product_name='$product_name[$i]';";
            $result3 = mysqli_query($conn, $sql3);

            while($row = mysqli_fetch_assoc($result3)) {
                $product_ids[$i] = $row["product_id"];
            }

            $sql4 = "INSERT INTO order_list (order_id, product_id, product_quantity) VALUES (?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql4)) {
                header("location: ../index.php?error=stmt2failed");
                exit();
            }
        
            mysqli_stmt_bind_param($stmt, "sss", $last_id, $product_ids[$i],  $product_quantity[$i]);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        header("location: ../orders.php?error=none");
        exit();
    }