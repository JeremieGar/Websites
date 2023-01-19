<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lobster&family=Montserrat:wght@100;400;600&family=Roboto+Mono&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/43124feaf5.js" crossorigin="anonymous"></script>
    

    <title>Customer Intro Page</title>
</head>
<body>
 
    <div class="login-row row">
        <div class ="login-card card col-lg-6">
            <h2 class="form-title">Client Login</h2>
                <form class = "form-group" action="includes/Client_Login.inc.php" method="post">
                    <div class="input-login">
                        <label class="label-name">Email</label>
                        <input type = "text" placeholder="Email Address" name="email"> 
                    </div>
                    <div class="input-login"> 
                        <label class="label-name">Password</label>
                        <input type="password" placeholder="Password" name="password">      
                    </div>
                    <button type="submit" class="submit-button btn btn-lg" id="clientLoginbtn" name="submit">Sign in</button>
                </form>
        </div>
    </div>
    <footer id="footer">
        <div class="bottom-footer">
            <p class="account">Click here to<a class="bottom-tag" href="client_signup.php"> Create Account</a></p>
            <p>Not a client, <a class="bottom-tag" href="supplierLogin.php">press here!</a> </p>
            
            <div class="social-icon">
            <i class="social-icon fa-brands fa-facebook"></i>
            <i class="social-icon fa-brands fa-twitter"></i>
            <i class="social-icon fa-brands fa-instagram"></i>
            <i class="social-icon fa-solid fa-envelope"></i>
            <p class="copyright">© Copyright Company</p>
        </div>
    </footer>
   <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="crossorigin="anonymous"></script>
    <script src = "script.js"> </script>
</body>
</html>