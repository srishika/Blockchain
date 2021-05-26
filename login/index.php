
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
 
<body>
<section class="forms-section">
<h1 class="section-title">WELCOME PEOPLE</h1>
<div class="forms">
<div class="form-wrapper is-active">
<script src="demo_script_src.js">
    </script>
            <button type="button" class="switcher switcher-login">Admin Login
            <span class="underline"></span></button>
            <form action="validate.php" method="post" class="form form-login">

            <!--  -->
            <fieldset>
                <legend>Please, enter your email and password for login.</legend>
                <div class="input-block">
                    <label for="login-email">E-mail</label>
                   
                    <input type="email" id="login-email" placeholder="Adminname"
                         name="adminname" value="" required>
                </div>
                <div class="input-block">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" placeholder="Password"
                         name="password" value="" required>
                </div>
            </fieldset>
                <button type="submit" class="btn-login" name="login" value="Log In">Login</button>
            </form>
</div>
<div>
        <div class="form-wrapper">
            
            <button type="button" class="switcher switcher-signup" onclick="hihello()">
                Teacher Login
                <span class="underline"></span>
            </button>
            <form class="form form-signup" action="validate2.php" method="post">
                <fieldset>
                <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                <div class="input-block">
                    <label for="signup-email">E-mail</label>
                    <input id="signup-email" type="email" name="UserName" value="" required >
                </div>
                <div class="input-block">
                    <label for="signup-password">Password</label>
                    <input id="signup-password" type="password" name="password1" value="" required>
                </div>
                </fieldset>
                <button type="submit" class="btn-signup" name="login" Value="" >Log in</button>
            </form>
            </div>
        </div>
</div>

</section>
</body>
 
</html>