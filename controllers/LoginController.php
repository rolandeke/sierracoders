<?php
session_start();

require 'db_model/dbconn.php';
$username = "";
$password = "";

$username_error = $pwd_error = '';

if (isset($_POST['btnLogIn'])) {
    $username = ($_POST['username']);
    $password = ($_POST['password']);

    if (empty($username)) {
        $username_error = "Please enter username/email";
    }
    if (empty($password)) {
        $pwd_error = "Please enter password";
    }
    //Check if the Account Exists in the Database
    $selecyQuery = "SELECT * FROM users WHERE username = ? or email = ? LIMIT 1";
    $statement = $db_conn->prepare($selecyQuery);
    $statement->bind_param('ss', $username, $username);
    $statement->execute();
    $returnedResult = $statement->get_result();
    
    $numberOfRowsReturned = $returnedResult->num_rows;
    if($numberOfRowsReturned <=0 ){
        $pwd_error = 'Not a Registered User';
    }

    if (empty($username_error) and empty($pwd_error)) {

        //Select user from the database
        $selecyQuery = "SELECT * FROM users WHERE username = ? or email = ? LIMIT 1";
        $statement = $db_conn->prepare($selecyQuery);
        $statement->bind_param('ss', $username, $username);
        $statement->execute();
        $returnedResult = $statement->get_result();
        $selectedUser = $returnedResult->fetch_assoc();

        
        //Verify if password matches user password in the database
        if (password_verify($password, $selectedUser['password'])) {

            $_SESSION['id'] =         $selectedUser['userid'];
            $_SESSION['firstname'] =  $selectedUser['firstname'];
            $_SESSION['lastname'] =  $selectedUser['lastname'];
            $_SESSION['username'] =   $selectedUser['username'];
            $_SESSION['email'] =      $selectedUser['email'];
            $_SESSION['isVerified'] = $selectedUser['isVerified'];
            
            if($_SESSION['isVerified'] === 0){
                header('location: verify.php');
            }else{
                header('location: index.php');
            }
            
          
        } else {
            $pwd_error = "Username or Password is incorrect";
        }
    }
}
else{
    
}
