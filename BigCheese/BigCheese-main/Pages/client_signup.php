<?php
// Include the database configuration file
include_once 'includes/dbConfig.inc.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="login.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lobster&family=Montserrat:wght@100;400;600&family=Roboto+Mono&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/43124feaf5.js" crossorigin="anonymous"></script>
</head>
<body>
   
    <div class="login-row row">
        <div class ="supplier-login card col-lg-6">
            <h2 class="form-title">Client Account</h2>
            <form class = "form-group" action="includes/Client_Signup.inc.php" method="POST">
                <div class="create-login input-login">
                    <label class="label-name">First Name</label>
                    <input type = "text" name="first_name" placeholder="First Name"> 
                </div>
                <div class="create-login input-login">
                    <label class="label-name">Last Name</label>
                    <input type = "text" name="last_name" placeholder="Last Name"> 
                </div>
                <div class="create-login input-login">
                    <label class="label-name">Email Address</label>
                    <input type = "text" name="email" placeholder="Email Address"> 
                </div>
                <div class="create-login input-login"> 
                    <label class="label-name">Password</label>
                    <input type="password" name="password1" placeholder="Password">
                </div>
                <div class="create-login input-login">
                    <label class=" label-name">Password confirmation</label>
                    <input class ="password-confirmation" type="password" name="password2" placeholder="confirm password"> 
                </div>
                <button type="submit" class="account-create create-btn btn" name="submit">Create Account</button>
            </form>    
        </div>
      </div>
      
      <footer id="supplier-footer">
        <div class="bottom-footer">
            <p class="account">Have an account? Click here to<a class="bottom-tag" href="client_login.php"> login!</a></p>
            <p>Not a client, press here to head to <a class="bottom-tag" href="supplierLogin.php">supplier login</a></p>
          <div class="social-icon">
            <i class="social-icon fa-brands fa-facebook"></i>
            <i class="social-icon fa-brands fa-twitter"></i>
            <i class="social-icon fa-brands fa-instagram"></i>
            <i class="social-icon fa-solid fa-envelope"></i>
            <p class="copyright">© Copyright Company</p>
          </div>
      </footer>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="crossorigin="anonymous"></script>
</body>
</html>