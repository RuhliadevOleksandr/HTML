<?php

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'toolarchive'; 
$connect=mysqli_connect($server, $user, $password);
mysqli_set_charset($connect, 'utf8');

$selected = mysqli_select_db($connect, $database);

?>