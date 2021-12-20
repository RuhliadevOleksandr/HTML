<?php
    session_start();
    include 'connection.php';
    include 'functions.php';

    $LastName=$_POST['LastName'];
    $FirstName=$_POST['FirstName'];
    $tool=$_POST['tool_name'];

    add_tool_to_exp($con, $tool, $LastName, $FirstName);
    header("Location: ../storage.php");
    
   
?>