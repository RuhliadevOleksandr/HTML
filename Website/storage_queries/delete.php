<?php
    session_start();
    include 'connection.php';
    include 'functions.php';

    $tool=$_POST['tool_name'];
    $quality=$_POST['Quality'];

    add_tool_to_storage($con, $tool, $quality);
    
    if($_POST['file_write']=='Yes'){
        $file = fopen('output.txt', 'a');
        fwrite($file, 'Tool '.$tool.' with quality "'.$quality.'" returned to storage'.PHP_EOL);  
        fclose($file);
    }
    

    header("Location: ../storage.php");
    
   
?>