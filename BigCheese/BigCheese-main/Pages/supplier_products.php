<?php
session_start();
include_once 'includes/dbConfig.inc.php';

// Check usertype
if (!isset($_SESSION['supplier_id'])) {
	header("Location: index.php");
	exit();
}

if (isset($_POST['add'])) {
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_quantity = $_POST['product_quantity'];
	$product_detail = $_POST['product_detail'];
	$supplier_id = $_SESSION['supplier_id'];


	$sql = "INSERT INTO products (product_name, price, quantity, detail, supplier_id) VALUES ('$product_name', '$product_price', '$product_quantity', '$product_detail', '$supplier_id')";

	if (mysqli_query($conn, $sql)) {
	 	echo "New record created successfully";
	} else {
	 	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}

?>

<!DOCTYPE html>
<html lang="en">

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

            <div>
				<table class="itemTable">
					<tbody>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Detail</th>
						</tr>
						<tr>
							<form action="" method="POST">
								<td><input type="text" name="product_name" id="itemName" placeholder="Product Name"></td>
								<td><input type="number" name="product_price" id="price" placeholder="Price"></td>
								<td><input type="number" name="product_quantity" id="quantity" placeholder="Quantity"></td>
								<td><input type="text" name="product_detail" id="detail" placeholder="Detail"></td>
								<td><button type="submit" name="add" class="add-row btn">Add<i class="fa-solid fa-circle-plus"></i></button></td>
							</form>

						</tr>
						<?php
							$sql = "SELECT * FROM products WHERE supplier_id = " . $_SESSION['supplier_id'];
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);

							if ($resultCheck > 0):
								while ($row = mysqli_fetch_assoc($result)):
						?>
						<tr class="client-order">
							<td><?php echo $row['product_name']; ?></td>
							<td><?php echo $row['price']; ?></td>
							<td><?php echo $row['quantity']; ?></td>
							<td><?php echo $row['detail']; ?></td>
							<td><button class="add-row btn"><i class="fa-solid fa-circle-plus"></i><a href="supplier_edit.php?edit=<?php echo $row['product_id'] ?>">Edit</a></button></td>
						</tr>
						<?php
								endwhile;
							endif;
						?>

						<tr>

						</tr>
					</tbody>
				</table>
            </div>
			
        </section>

        <?php
            require 'sidebar_right.php';
        ?>

    </main>
    
</body>

</html>