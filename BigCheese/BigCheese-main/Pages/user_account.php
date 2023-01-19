<?php
    session_start();
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
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <main>
            <?php
                if(isset($_SESSION["first_name"])) {
                    require 'client_sidebar_left.php';
                }
                else {
                    require 'supplier_sidebar_left.php';
                }
            ?>


            <section class="maincontent">
                <h2 class="h2Acc">Your Account</h2>
                <div class="infoDiv">

                    <?php
                        require 'user_account_table.php';
                    ?>
                    
                </div>
            </section>

            <?php
                require 'sidebar_right.php'
            ?>

        </main>
    </body>
</html>