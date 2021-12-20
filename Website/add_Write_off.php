<?php
        include 'accounting.php';
        require_once("connect.php");
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        if (isset($_POST['Write_off_New'])) 
        {
            $Name_instrument = $_POST['Name_instrument'];
            $Name_Storage = $_POST['Name_storage'];            
            $query = "UPDATE Tool SET Quality = 'unfit' WHERE ToolID>0 AND Name='$Name_instrument' AND (SELECT StorageID from Storage WHERE Name='$Name_Storage')";
            mysqli_query($connect, $query);
            mysqli_close($connect);
        }
?>