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

    <div class="row">
        <div class="col-12 col-sm-12 text-center py-5">
            <h3 class="display-3">Welcome To Sierra Coders</h3>
            <p class="text-center m-3 lead">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim, labore modi totam veniam ducimus, officia praesentium deserunt pariatur, maiores mollitia tempore sed repellat temporibus sit maxime nobis exercitationem eveniet perspiciatis?
            </p>
            <a href="" class="btn btn-warning p-2">START LEARNING</a>
        </div>
    </div>
        <div class="row m-5">
            <div class="col-12 col-sm-4">
                <div class="card">
                    <img src="./assets/images/course05.jpg" alt="" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h4 >JAVA Tutorials</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, cupiditate?</p>
                        <a href="" class="btn btn-primary btn-block">Enroll</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            <div class="card">
                    <img src="./assets/images/course05.jpg" alt="" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h4>PHP Tutorial</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, cupiditate?</p>
                        <a href="" class="btn btn-primary btn-block">Enroll</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            <div class="card">
                    <img src="./assets/images/course05.jpg" alt="" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h4>Python Tutorials</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, cupiditate?</p>
                        <a href="" class="btn btn-primary btn-block">Enroll</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-5">
            <div class="col-12 col-sm-4">
                <div class="card">
                    <img src="./assets/images/course05.jpg" alt="" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h4>C++ Tutorials</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, cupiditate?</p>
                        <a href="" class="btn btn-primary btn-block">Enroll</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            <div class="card">
                    <img src="./assets/images/course05.jpg" alt="" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h4>C# Tutorials</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, cupiditate?</p>
                        <a href="" class="btn btn-primary btn-block">Enroll</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            <div class="card">
                    <img src="./assets/images/course05.jpg" alt="" class="card-img-top img-fluid">
                    <div class="card-body">
                        <h4>React Tutorials</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, cupiditate?</p>
                        <a href="" class="btn btn-primary btn-block">Enroll</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <center>
            <h3>Dear <span style="color:green"> <?php echo ($_SESSION['username']); ?></span>, the website is Still being developed. <br> Kindly Check back in a while and all contents will be available
                <br>Thank you for learning with Sierra Coders
            </h3>
        </center> -->



        <?php
        include 'foot.php';
        ?>