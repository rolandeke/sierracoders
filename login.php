<?php require_once 'controllers/LoginController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <?php include 'tophead.php'; ?>
    <div class="container">

        <div class="login-wrapper">
            <h3>Welcome Back Coder.</h3>
            <h4>Login to Continue your Journey With us</h4>
            <form action="login.php" method="post">
                <fieldset>
                    <label for="username">Username or email</label><br>
                    <input value="<?php echo $username; ?>" type="text" name="username" placeholder="Username...">
                    <span class="error-span"><?php echo $username_error; ?></span>
                </fieldset>
                <fieldset>
                    <label for="password">Password</label><br>
                    <input type="password" name="password" placeholder="Password">
                    <span class="error-span"><?php echo $pwd_error; ?></span>
                </fieldset>
                
                <fieldset>
                    <button type="submit" name="btnLogIn">Log In</button>
                    <a href="" style="color:black;">Lost Your Password ?</a>
                    <p class="login-txt">Need an account ?<a href="signup.php">Join our Community</a></p>
                </fieldset>

            </form>
        </div>

    </div>


    <?php
    include 'foot.php';
    ?>