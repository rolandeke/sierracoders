<?php require_once 'controllers/SignupController.php';
require_once 'controllers/LogoutController.php';

if (!isset($_SESSION['id'])) {
    header('location: login.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>SL Coders - Home</title>
</head>

<body>
    <?php
    include 'tophead.php';
    ?>
    <div class="container">


        <center>
            <h3>Dear <span style="color:green"> <?php echo ($_SESSION['username']); ?></span>, the website is Still being developed. <br> Kindly Check back in a while and all contents will be available
                <br>Thank you for learning with Sierra Coders
            </h3>
        </center>



        <?php
        include 'foot.php';
        ?>