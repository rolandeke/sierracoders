<?php
require_once 'controllers/SignupController.php';
require_once 'controllers/LogoutController.php';
require_once 'controllers/EmailController.php';

if (isset($_GET['token'])) {
$token = $_GET['token'];
verifyUser($token);
}


if (!isset($_SESSION['id'])) {
header('location: login.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="css/main.css">
<title>SL Coders - Verify</title>
</head>

<body>
<?php
include 'tophead.php';
?>
<div class="container">

<div class="home">
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="<?php echo $_SESSION['alert-class']; ?>">
            <?php echo ($_SESSION['message']);
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
        </div>

        <h3>Welcome, <?php echo ($_SESSION['firstname'] . ' ' . $_SESSION['lastname']); ?></h3>
    <?php endif; ?>
 
        <div class="alert-warning">
            Thank you for your membership to Sierra Coders. Your membership
            will be activated as soon as you confirm you email address.
            Important! You must click on the verfification URL sent to
            <strong><?php echo ($_SESSION['email']); ?></strong>
            before you can gain full access to your account.

            <br>

        </div>
    



    <?php if (isset($_SESSION['isVerified']) === 1) : ?>
        <button><a href="index.php">Account Verified</a></button>
    <?php endif; ?>
</div>
<!--End of Home DIV -->




<?php
include 'foot.php';
?>