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
                    <h2 class="form-title">Employee account</h2>
                    <form class = "form-group">
                        <div class="create-login input-login">
                            <label class=" label-name">Email</label>
                            <input class ="email" type = "text" placeholder="Email"> 
                        </div>
                    <div class="create-login input-login">
                        <label class="label-name">Username</label>
                        <input type = "text" placeholder="Username"> 
                    </div>
                    <div class="create-login input-login"> 
                            <label class="label-name">Password</label>
                            <input class='first-password'type="password" placeholder="Password">
                    </div>
                    <div class="create-login input-login">
                        <label class=" label-name">Password confirmation</label>
                        <input class ="password-confirmation" type = "password" placeholder="confirm password"> 
                    </div>
                    <button type="button" class="account-create create-btn btn">Create Account</button>
               
                </form>
                
        </div>
      </div>
      
      <footer id="supplier-footer">
        <div class="bottom-footer">
            <p class="account">Click here to<a class="bottom-tag" href="customerLogin.html"> Client Login</a></p>
            <p>Not a client, <a class="bottom-tag" href="supplierLogin.html">press here!</a> </p>
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