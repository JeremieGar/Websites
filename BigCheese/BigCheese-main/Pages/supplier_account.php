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
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <main>
            <?php
                require 'supplier_sidebar_left.php'
            ?>

            <section class="maincontent">
                <h2 class="h2Acc">Your Account</h2>
                <div class="infoDiv">
                    <table class="userInfoTable">
                        <tr>
                            <td class="tdImg"><img src="anonymous2.jpg" class="img"><br><a href="" class="upload">Upload a photo (jpg or png)</a></td>
                            <td>
                            <input type="text" placeholder="First Name">
                                <br><br>
                                <input type="text" placeholder="Last Name">
                                <br><br>
                                <input type="text" placeholder="User Name">
                                <br><br>
                                <input type="text" placeholder="Password">
                                <br><br>
                                <input type="text" placeholder="Email Address">
                            </td>
                        </tr>
                        <tr>
                            <td class="tdImg">
                                <button type="submit" class="accEditBtn">Edit</button>
                            </td>
                        
                        </tr>
                    </table>
                </div>
            </section>

            <section class="sidebar">
                <!-- First inner container  -->
                <section id = "main">
                    <div>
                        <ul>
                            <!-- Potentially a link to the home page -->
                            <li><a href="supplier_account.php" style="font-size: 15px;">Account</a></li>  
                        </ul>
                    </div>
                </section>
            </section>
        </main>
    </body>
</html>