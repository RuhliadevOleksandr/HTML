<?php 
    include 'functions.php';
    $connection = new mysqli("localhost", "root", null, "toolarchive") or die ("Could not connect:");
    if(isset($_POST['toolName']))
    {
        add_brake_tool($connection, $_POST["toolName"], $_POST["storageName"]);
    }
    if(isset($_POST['show'])){
        show_brake_tools($connection);
    }
    $connection->close();
?>