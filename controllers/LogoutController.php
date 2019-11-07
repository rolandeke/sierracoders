<?php

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['firstname']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['isVerified']);
    header('location: login.php');
    exit();
}
