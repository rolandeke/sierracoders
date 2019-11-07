<?php

require 'constants.php';

$db_conn = new mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);

if ($db_conn->connect_error) {
   die('Database Error: ' . $db_conn->connect_error);
}else{
   
}