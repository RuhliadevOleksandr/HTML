<?php
    //Connection configuration
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con=mysqli_connect('localhost', 'root', '', 'toolarchive');
    if(mysqli_connect_errno()){
        echo "Failed";
        exit();
    }

?>