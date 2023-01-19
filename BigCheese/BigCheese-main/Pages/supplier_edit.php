<?php
session_start();
include_once 'includes/dbConfig.inc.php';

// Check usertype
if (!isset($_SESSION['supplier_id'])) {
	header("Location: index.php");
	exit();
}

if (isset($_POST['delete'])) {
	$product_id = $_GET['edit'];

	$sql = "DELETE FROM products WHERE product_id = '$product_id'";

	if (mysqli_query($conn, $sql)) {
	 	echo "Record deleted successfully";
        header("Location: supplier_products.php");
	} else {
	 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


if (isset($_GET['edit'])) {
    $product_id = $_GET['edit'];
    
    $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
    $product_name = $row['product_name'];
    $product_price = $row['price'];
    $product_quantity = $row['quantity'];
    $product_detail = $row['detail'];
    $supplier_id = $row['supplier_id'];
}

if (isset($_POST['edit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_detail = $_POST['product_detail'];
    $supplier_id = $_SESSION['supplier_id'];

    $sql = "UPDATE products SET product_name = '$product_name', price = '$product_price', quantity = '$product_quantity', detail = '$product_detail', supplier_id = '$supplier_id' WHERE product_id = '$product_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        header("Location: supplier_products.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="test.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>

<body>
    <main>
        <?php
            require 'supplier_sidebar_left.php'
        ?>

        <section class="maincontent">
            <div>
                <table>
                    <tr>
                        <td>
                            <button class="filterBtn"><i class="fa fa-filter"></i>&nbspFilter</button>
                        </td>
                        <td>
                            <select class="drpdwnSrch">
                                <option class="content">By Name</option>
                                <option class="content">By ID</option>
                                <option class="content">By [...]</option>
                            </select>
                            <input type="text" placeholder="Search..." class="srchBar">
                            <button type="submit" class="srchBtn"><i class="fa fa-search"></i></button>
                        </td>
                        <td class="showResults">Showing (number of) Results</td>
                        <td>
                            <label class="sortBy">Sort by:</label>
                            <select class="drpdwnSrch">
                                <option class="content">Featured</option>
                                <option class="content">Price: Low to High</option>
                                <option class="content">Price: High to Low</option>
                                <option class="content">Date: New to Old</option>
                                <option class="content">Date: Old to New</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="form-popup" id="myForm">
                <form action="" method="POST">
                    <label for="itemName">Product Name</label>
                    <input type="text" name="product_name" id="itemName" value="<?php echo $product_name ?>" placeholder="Product Name">
                    <label for="price">Price</label>
                    <input type="number" name="product_price" id="price" value="<?php echo $product_price ?>" placeholder="Price">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="product_quantity" id="quantity" value="<?php echo $product_quantity ?>" placeholder="Quantity">
                    <label for="detail">Detail</label>
                    <input type="text" name="product_detail" id="detail" value="<?php echo $product_detail ?>" placeholder="Detail">
                    <button type="submit" name="edit" class="add-row btn">Submit</button>
                    <button type="submit" name="delete" class="add-row btn">Delete</button>
                </form>
			</div>
        </section>

        <?php
            require 'sidebar_right.php';
        ?>
    </main>
</body>
</html>