<?php

    include_once 'includes/dbConfig.inc.php';
    session_start();

    $clientID = $_SESSION["client_id"];

    $sql1 = "SELECT * FROM orders WHERE client_id=$clientID";
    $result1 = mysqli_query($conn, $sql1);
    $resultCheck1 = mysqli_num_rows($result1);

    if ($resultCheck1 > 0) {

        echo
            "<table class=\"itemTable\">
            <tr>
                <th>Order Number</th>
                <th>Supplier Name</th>
                <th>Order ID</th>
                <th>Total Units</th>
                <th>Total</th>
                <th>Status</th>
            </tr>";
        
        while ($row1 = mysqli_fetch_assoc($result1)) {

            $execution_number = 0;
            $table_number = 1;
            $order_id = $row1["order_id"];
            $order_total = $row1["order_total"];
            $supplier_name = "";
            $total_units = 0;
            
            $sql2 = "SELECT product_id, product_quantity FROM order_list WHERE order_id=$order_id;";
            $result2 = mysqli_query($conn, $sql2);
            
            while ($row2 = mysqli_fetch_assoc($result2)) {
                
                $total_units += (int)$row2["product_quantity"];
                
                if ($execution_number == 0) {

                    $execution_number++;
                    $product_id = $row2["product_id"];

                    $sql3 = "SELECT supplier_id FROM products WHERE product_id=$product_id;";
                    $result3 = mysqli_query($conn, $sql3);
                    
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        $supplier_id = $row3["supplier_id"];

                        $sql4 = "SELECT company_name FROM suppliers WHERE supplier_id=$supplier_id;";
                        $result4 = mysqli_query($conn, $sql4);
                    
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                            $supplier_name = $row4["company_name"];

                            echo
                            "<tr>
                                <td>$table_number</td>
                                <td>$supplier_name</td>
                                <td>$order_id</td>
                                <td>$total_units</td>
                                <td>$order_total$</td>
                                <td>Approved</td>
                            </tr>";
                        }
                    }
                }
            }
            $table_number++;
        }
        echo "</table>";
    }