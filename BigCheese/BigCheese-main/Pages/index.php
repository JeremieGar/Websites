<?php
    session_start();
    include_once 'includes/dbConfig.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <script src="https://kit.fontawesome.com/43124feaf5.js" crossorigin="anonymous"></script>
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
                        <li>
                            <form action="includes/logout.inc.php" method="post">
                                <button type="submit" name="logout-submit">Logout</button>
                            </form>
                        </li>  
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
            <!-- action="includes/Order_total.inc.php" -->
                <?php
                    require 'client_display_products.php';
                ?>
                
            <script>
                $(document).ready(function() {
                /* This section is for the cart */
                var cheap_name = '';
                var txt_info = '';
                const max_order = 5000;
                var full_report = '';
                var cart_totals = 0;
                var cheapest_supplier = '';
                let total = '';
                let roundedTotal = 0.0;
                var sum = 0.0;
                const sales_map = new Map();
                 var client_counter = 0;
                 var product_name = '';
                 var itemName = '';
                 var min_sum = 0;

                    $('.filterBtn').click(function(){
                     
                        var client_counter = 0;
                        var price = 0.0;
                        var quantity = 0.0;
                        var addRow = '';
                       
                        var i = 3;
                        
                    
                    while (client_counter < i){
                        sum = 0.0;
                        let sales_list = [];;
                        
                        $(`.itemTable${client_counter} tr`).each(function(){
                            
                            $(this).find('.price').each(function(){
                                price = parseFloat($(this).val());
   
                            });

                            $(this).find('#quantity').each(function(){
                                quantity = parseFloat($(this).val());
                                sum += quantity*price;

                            }); 
                            itemName = $(this).find(`#supplier${client_counter}`).val();
                            product_name = $(this).find('#product').val();
                            
                            if(product_name != undefined && !(sales_list.includes(product_name))){
                                sales_list.push(product_name,price,quantity, sum);
                            }
                            if(itemName != undefined){
                                sales_map.set(itemName, sales_list);
                                }

                            roundedTotal = sum.toFixed(2);  
 
                            $(`.cart-total${client_counter}`).val('');
                            $(`.cart-total${client_counter}`).val(roundedTotal+'$');
    
                        }); 
                      
                        client_counter++;
                        console.log(sales_map.keys()," this is the values of big cheese:" , sales_map.values());
 
                    }
                });

                $('.submitBtn').click(()=>{
                    
                    var displayInfo = sales_map.keys();
                    
                    for (var [key, val] of sales_map){
                        var joined = '';
                        cart_totals = val[7];
                        
                        if(cart_totals < min_sum || min_sum === 0){
                            if(cart_totals !== 0){
                            min_sum = cart_totals;
                            cheapest_supplier = key;
                            
                            }
                        }
                            if (cart_totals !== 0){
                              joined = val.join('\n');
                            full_report = full_report.concat("\n\n"+key+"\n" + joined);
                             
                        }
                    }
                    
                    if ((min_sum > max_order) ? alert("Your order from " + cheapest_supplier + " is pending.") :  alert("----------- Big Cheese Report ----------- \n" + full_report + "\n\nThe best supplier is: " + cheapest_supplier + " for a total cost of $" + min_sum));

                });
                });
            </script>
            
              

        </section>
            
        <?php
            require 'sidebar_right.php';
        ?>
        
    </main>
    
</body>
</html>
