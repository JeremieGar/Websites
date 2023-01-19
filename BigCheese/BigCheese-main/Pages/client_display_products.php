<?php
    include_once 'includes/dbConfig.inc.php';

    $sql1 = "SELECT supplier_id, company_name FROM suppliers";
    $supplierResult = mysqli_query($conn, $sql1);
    $resultCheck1 = mysqli_num_rows($supplierResult);

    if ($resultCheck1 > 0) :

        $table_number = 0;
        while ($row1 = mysqli_fetch_assoc($supplierResult)) : //loop of supplier

            $supplierID = $row1["supplier_id"];
            $company_name = $row1["company_name"];
            $current_company_name = $company_name . "";
            
            $sql2 = "SELECT * FROM products WHERE supplier_id='$supplierID';";
            $productResult = mysqli_query($conn, $sql2);
            $resultCheck2 = mysqli_num_rows($productResult); // number of products for a supplier

            if ($resultCheck2 > 0) : // Checking if number of products is > 0
                ?>
                    <form method="post" action="includes/Order_total.inc.php">
                    <table class="itemTable<?php echo $table_number?>">
                    <tr>
                        <th id = "supplier" >Supplier Name</th>
                        <th>Item Name</th>
                        <th>Product ID</th>
                        <th>Price/Item</th>
                        <th>Amount in Stock</th>
                        <th>Desired Amount</th>
                    </tr>

                <?php
                $count = 0;

                while ($row2 = mysqli_fetch_assoc($productResult)) : // loop of supplier products
                    
                    if ($count > 0) {
                        $company_name = "";
                    }

                    $product_name = $row2["product_name"];
                    $productID = $row2["product_id"];
                    $price = $row2["price"];
                    $quantity = $row2["quantity"];
                    $detail = $row2["detail"];

                    ?>
                    <tr>
                        <td >
                            <input id = "<?php ($company_name != "") ? print 'supplier' . $table_number :  '' ?>"type="hidden" name="company_name[]" value="<?php echo $current_company_name ?>" readonly><?php echo $company_name ?>
                        </td>
                        <td >
                            <input id = "product" type="text" name="product_name[]" value="<?php echo $product_name ?>" readonly>
                        </td>
                        <td> 
                            <input type="text" name="product_id[]" value="<?php echo $productID ?>" readonly>
                        </td>
                        <td >
                            <input class="price" type="text" name="product_price[]" value="<?php echo $price ?>$" readonly>
                        </td>
                        <td>
                            <input type="text" name="product_quantity_available[]" value="<?php echo $quantity ?>" readonly>
                        </td>
                        <td>
                            <input type="number" name="order_quantity[]" id="quantity" value="0" class ="add">
                        </td>
                        <td><button type="button" class="filterBtn">add</button></td>
                    </tr>
                    
                    
                    <?php
                    $count++;
                endwhile;
            endif;
            ?>
            </table>
            <div class="total-section row">
                    <header class="cart-header">Total<i class="fa-solid fa-cart-shopping"></i></header>
                    <!-- <form method = "GET"> -->
                    <input name = "total<?php echo $table_number?>" class="cart-total<?php echo $table_number?>" value = "0.00$" readonly></input>
                    <!-- </form> -->
                    <button class ="submitBtn" type="submit" name="order_submit">Submit</button>
                </div>
            </form>
        <?php
        $table_number++;
        endwhile;
    endif;

