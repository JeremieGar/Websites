<!DOCTYPE html>
<html lang="en">

<head>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        
</head>

<body>
    <main>
        <section class="sidebar">
            <!-- First inner container  -->
            <section id = "main">
                <div>
                    <ul>
                        <!-- Potentially a link to the home page -->
                        <li><a href="index.php">Products</a></li>  
                    </ul>
                </div>
            </section>

            <!-- Second inner container -->
        <section id ="main">

            <div>
                <ul>
                    <li><a href="orders.php">Orders</a></li>  
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="customerLogin.php">Logout</a></li>  
                </ul>
            </div>
            </section>
        </section>

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
                    <tr>
                        <th id = "supplier" >Cart</th>
                        <th>Items</th>
                        <th>Supplier / Product Id</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Product 1</td>
                        <td>product A</td>
                        <td>4</td>
                        <td>506$</td>
                        <td><button class ="filterBtn">Add to cart</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Product 1</td>
                        <td>product B</td>
                        <td>3</td>
                        <td>76$</td>
                        <td><button class ="filterBtn">Add to cart</button></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>Product 1</td>
                        <td>product C</td>
                        <td>2</td>
                        <td>50$</td>
                        <td><button class ="filterBtn">Add to cart</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Product 1</td>
                        <td>product A</td>
                        <td>5</td>
                        <td>60$</td>
                        <td><button class ="filterBtn">Add to cart</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Product 1</td>
                        <td>product B</td>
                        <td>4</td>
                        <td>3545$</td>
                        <td><button class ="filterBtn">Add to cart</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Product 1</td>
                        <td>product C</td>
                        <td>4</td>
                        <td>560$</td>
                        <td><button class ="filterBtn">Add to cart</button></td>
                    </tr>
                </table>
                <table class="itemTable">
                    <tr>
                        <th>Checkout</th>
                        <th>Order Number</th>
                        <th>Total</th>
                        <th>Order Status</th>
                    </tr>
                    <tr>
                        <td>Usename@email.com</td>
                        <td>5</td>
                        <td>5567$</td>
                        <td><Button class ="filterBtn">Confirm Order</Button></td>
                    </tr>
                    </tr>
                </table>
            </div>
            </div>
        </section>

        <section class="sidebar">
            <!-- First inner container  -->
            <section id = "main">
                <div>
                    <ul>
                        <!-- Potentially a link to the home page -->
                        <li><a href="cart.php">Cart</a></li>  
                    </ul>
                </div>
                <div>
                    <ul>
                        <!-- Potentially a link to the home page -->
                        <li><a href="user_account.php">Account</a></li>  
                    </ul>
                </div>
        </section>

    </main>
</body>
</html>