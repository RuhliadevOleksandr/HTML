<?php
    function check_query($query, $data, $connection){
        if ($connection->query($query) === FALSE)
            return "<span class='error'>" . "Error: " . $query . "<br>" . $connection->error . "<br>" . "</span>";
        else
            return "<p>"."Data about $data was successfully update in DB!"."</span>";
    }
    
    function check_if_exist_name($connection, $name, $table){
        $query = "SELECT * FROM $table WHERE Name=\"$name\"";
        $result = $connection->query($query);
        if ($result->num_rows > 0)
            return '';
        else
            return "<span class='error'>"."Data about tool was not update in DB! Has no $table with name: $name"."</span>"."<br>";
    }

    function add_brake_tool($connection, $toolName, $storageName){
        $hasToolName = check_if_exist_name($connection, $toolName, 'tool');
        $hasStorageName = check_if_exist_name($connection, $storageName, 'storage');
        if(empty($hasToolName) and empty($hasStorageName)){
            $query = "UPDATE tool SET Quality='brake', StorageID=(SELECT StorageID FROM storage WHERE Name=\"$storageName\"), WorkerID=NULL WHERE Name=\"$toolName\"";
            echo check_query($query, $toolName, $connection);
        }
        else
            echo $hasToolName . $hasStorageName;
    }

    function show_brake_tools($connection){
        $query = "SELECT tool.Name AS 'ToolName', storage.Name AS 'StorageName' FROM tool INNER JOIN storage ON tool.StorageID=storage.StorageID WHERE tool.Quality='brake'";
        echo "<tr><th>Інструмент</th><th>Сховище</th></tr>";
        $rows = $connection->query($query);
        foreach ($rows as $row) {
            echo "<tr><th>".$row['ToolName']."</th><th>".$row['StorageName']."</th></tr>";
        }
    }
?>