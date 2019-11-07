<?php
session_start();
require 'db_model/dbconn.php';
require 'controllers/EmailController.php';
$firstname = "";
$lastname = "";
$username = "";
$email = "";
$password_1 = "";
$password_2 = "";
//Error Variables
$fname_error = $lastname_error = $gender_error = $email = $email_error = $pwd_error = $username_error = $cpwd_error = $db_error = '';

//check if signup button was clicked
if (isset($_POST['btnSignUp'])) {


    //retrieve users info from input fields and store in variables 
    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $gender = ($_POST['gender']);
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password_1 = ($_POST['password_1']);
    $password_2 = ($_POST['password_2']);

    //input fields validation
    if (empty($firstname)) {
        $fname_error = "Firstname is Required";
    }
    if (empty($lastname)) {
        $lastname_error = "Lastname is Required";
    }
    if (empty($gender)) {
        $gender_error = "Select a Gender";
    }
    if (empty($username)) {
        $username_error = "Username is Required";
    }
    if (empty($email)) {
        $email_error = "Email is Required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Email address is invalid";
    }
    if (empty($password_1)) {
        $pwd_error = "Password cannot be empty.Length must be > 8";
    }
    if (empty($password_2)) {
        $cpwd_error = "Confirm Password cannot be empty";
    }
    if ($password_1 !== $password_2) {
        $cpwd_error = "Passwords do not match";
    }

    //duplicate email and username validation in Database 
    $emailQuery = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $statement = $db_conn->prepare($emailQuery);
    $statement->bind_param('s', $email);
    $statement->execute();
    $returnedResult = $statement->get_result();
    $numberOfRowsReturned = $returnedResult->num_rows;
    
    if ($numberOfRowsReturned > 0) {
        $email_error = "Email Already Exists";
    }

    $usernameQuery = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $statement = $db_conn->prepare($usernameQuery);
    $statement->bind_param('s', $username);
    $statement->execute();
    $returnedResult = $statement->get_result();
    $numberOfRowsReturned = $returnedResult->num_rows;
   
    if ($numberOfRowsReturned > 0) {
        $username_error = "Username already taken";
    }

    //SAVE USER TO DATABASE OF THERE ARE NO ERRORS IN THE ERRORS ARRAY
    if (empty($fname_error) and empty($lastname_error) and empty($gender_error) and empty($username_error) and empty($email_error) and empty($pwd_error) and empty($cpwd_error)) {
        //ENCRYPT USERS PASSWORD FOR SECURITY REASONS 
        $hashedPassword = password_hash($password_1, PASSWORD_DEFAULT);

        //GENERATE TOKEN FOR EMAIL VERIFICATION
        $token = bin2hex(rand(1000,99999));
        $isVerified = 0;

        //insert user into the users table
        $insertQuery = "INSERT INTO users (firstname,lastname,gender,username,email,password,token,isVerified) VALUES (?,?,?,?,?,?,?,?)";
        $statement = $db_conn->prepare($insertQuery);
        $statement->bind_param('sssssssi', $firstname, $lastname, $gender, $username, $email, $hashedPassword, $token, $isVerified);

        //log user in if registration was successful
        if ($statement->execute()) {
            $user_id =                $db_conn->insert_id;
            $_SESSION['id'] =         $user_id;
            $_SESSION['firstname'] =  $firstname;
            $_SESSION['username'] =   $username;
            $_SESSION['lastname'] =   $lastname;
            $_SESSION['email'] =      $email;
            $_SESSION['isVerified'] = $isVerified;
            //Send Verification Email
            if(sendVerificationEmail($email, $token,1)){
                 //Display Success Message
                $_SESSION['message'] = "You are now logged in!!!";
                $_SESSION['alert-class'] = "alert-success";
                header('location: verify.php');
                exit();
            }else{
                $db_error = "Message was not sent";
            }
           
           
        } else {
            $db_error = "There was an Error. Registration Failed try again.";
        }
    }
}

//Verify User Function

function verifyUser($token)
{
    global $db_conn;
    //Select  user from database by their unique token
    $selectQuery = "SELECT * FROM users WHERE token = '$token'LIMIT 1";
    $result = mysqli_query($db_conn,$selectQuery);
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $update = "UPDATE users SET isVerified = 1 WHERE token = '$token'";
        if(mysqli_query($db_conn,$update)){
            $_SESSION['id'] =         $user['userid'];
            $_SESSION['firstname'] =  $user['firstname'];
            $_SESSION['lastname'] =  $user['lastname'];
            $_SESSION['username'] =   $user['username'];
            $_SESSION['email'] =      $user['email'];
            $_SESSION['isVerified'] = 1;
            $_SESSION['message'] = "Email Verified Successfully";
            $_SESSION['alert-class'] = "alert-success";
            header('location: index.php');
            exit();

        }
    }else{
        echo 'User not Found';
    }
 
}
