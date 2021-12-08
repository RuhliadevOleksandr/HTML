<?php 
    include 'example_form_add.php';
    echo "<br>";
    $connection = new mysqli("localhost", "root", null, "toolarchive") or die ("Could not connect:");
    if(isset($_POST['submitWorker']))
    {
        addWorker($connection, $_POST["firstName"], $_POST["lastName"]);
    }
    if(isset($_POST['submitGroup'])){
        addGroup($connection, $_POST["groupName"]);
    }
    if(isset($_POST['submitStorage'])){
        addStorage($connection, $_POST["storageName"], $_POST["storageAdress"]);
    }
    if(isset($_POST['submitTool'])){
        addTool($connection, $_POST["toolName"], $_POST["quality"], $_POST["description"], $_POST["groupID"], $_POST["storageID"]);
    }
    $connection->close();
?>