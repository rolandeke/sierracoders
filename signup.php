<?php require_once 'controllers/SignupController.php';

if (isset($_SESSION['id'])) {
header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/fonts.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<title>Sign Up</title>
</head>

<body>
<?php include 'tophead.php'; ?>
<!-- <div class="jumbotron">
    <h1><span>Sierra</span> Coders</h1>
</div> -->
<header id="banner">
    <div class="banner-title">
        <h1 class="banner-text"> <span style="color: green;">Sierra</span>  Coders</h1>
        <div class="banner-underline"></div>
        <div class="banner-btn">
            <!-- <button type="button">Join Us</button> -->
            <!-- <button type="button">About Us</button> -->
        </div>
    </div>
</header>
<div class="container">

    <div class="wrapper">
        <div class="leftWrapper">
        </div>
        <div class="rightWrapper">
            <h1>Sign Up With <br><span>SIERRA CODERS</span></h1>
            <p style="font-size:1.2em;margin-bottom:4px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, vel!</p>
            <form action="signup.php" method="POST" autocomplete="on">

                <fieldset>
                    <label for="firstname">Firstname</label><br>
                    <input value="<?php echo $firstname; ?>" type="text" name="firstname" placeholder="Firstname...">
                    <span class="error-span"> <?php echo $fname_error ?> </span>
                </fieldset>

                <fieldset>
                    <label for="lastname">Lastname</label><br>
                    <input value="<?php echo $lastname; ?>" type="text" name="lastname" placeholder="Lastname...">
                    <span class="error-span"> <?php echo $lastname_error ?> </span>
                </fieldset>

                <fieldset>
                    <label for="gender">Gender</label><br>
                    <select name="gender" value="">
                        <option value="">--Select Gender--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span class="error-span"> <?php echo $gender_error ?> </span>
                </fieldset>

                <fieldset>
                    <label for="username">Username</label><br>
                    <input value="<?php echo $username; ?>" type="text" name="username" placeholder="Username...">
                    <span class="error-span"> <?php echo $username_error ?> </span>
                </fieldset>

                <fieldset>
                    <label for="email">Email</label><br>
                    <input value="<?php echo $email; ?>" type="text" name="email" placeholder="Email...">
                    <span class="error-span"> <?php echo $email_error ?> </span>
                </fieldset>

                <fieldset>
                    <label for="password_1">Password</label><br>
                    <input value="<?php echo $password_1; ?>" type="password" name="password_1" placeholder="Password">
                    <span class="error-span"> <?php echo $pwd_error ?> </span>
                </fieldset>

                <fieldset>
                    <label for="password_2">Confirm Password</label><br>
                    <input value="<?php echo $password_2; ?>" type="password" name="password_2" placeholder="Confirm Password">
                    <span class="error-span"> <?php echo $cpwd_error ?> </span>
                </fieldset>

                <fieldset>
                    <button type="submit" name="btnSignUp">Sign Up</button>
                    <span class="error-span"> <?php echo $db_error ?> </span>
                    <p class="login-txt">Already a Member ?<a href="login.php">Login In Here</a></p>

                </fieldset>

            </form>

        </div>
    </div>
    



    <?php
    include 'foot.php';
    ?>