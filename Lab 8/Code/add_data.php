<?php
    function checkQuery( $connection, $query, $data){
        if ($connection->query($query) === FALSE)
            echo "<span class='error'>" . "Error: " . $query . "<br>" . $connection->error . "<br>" . "</span>";
        else
            echo "<p>"."Data about $data was successfully add to DB!"."</p>";
    }

    function checkIfNotEmpty($dataArray){
        for ($i=0; $i < count($dataArray[0]); $i++) { 
            if(empty($dataArray[0][$i])){
                echo "<span class='error'>"."Data about $dataArray[2] was not add to DB! " . $dataArray[1][$i] . " must be initialize!"."</span>";
                return false;
            }
        }
        return true;
    }

    function addWorker($connection, $firstName, $lastName){
        $query = "";
        if(checkIfNotEmpty([[$firstName, $lastName], ['First name', 'Last name'], 'worker'])){
            $query = "INSERT IGNORE INTO worker (FirstName, LastName) VALUES (\"$firstName\", \"$lastName\");";
            checkQuery($connection, $query, $lastName);
        }
    }

    function addGroup($connection, $name){
        $query = "";
        if(checkIfNotEmpty([[$name], ['Name'], 'group'])){
            $query = "INSERT IGNORE INTO `group` (Name) VALUES (\"$name\");";
            checkQuery($connection, $query, $name);
        }
    }

    function addStorage($connection, $name, $adress){
        $query = "";
        if(checkIfNotEmpty([[$name, $adress], ['Name', 'Adress'], 'storage'])){
            $query = "INSERT IGNORE INTO `storage` (Name, Adress) VALUES (\"$name\", \"$adress\");";
            checkQuery($connection, $query, $name);
        }
    }

    function checkIfExistID($connection, $id, $nameID, $table){
        $query = "SELECT $nameID FROM $table";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row["$nameID"] == $id)
                    return true;
            }
        }
        echo "<span class='error'>"."Data about tool was not add to DB! Has no $nameID with index: $id"."</span>"."<br>";
        return false;
    }

    function addTool($connection, $name, $quality, $description, $groupID, $storageID){
        $query = "";
        $dataArray = [$name, $quality, $groupID, $storageID];
        $nameArray = ['Name', 'Quality', 'GroupID', 'StorageID'];
        if(checkIfNotEmpty([$dataArray, $nameArray, 'tool'])){
            $hasGroupID = checkIfExistID($connection, $groupID, 'GroupID', '`group`');
            $hasStorageID = checkIfExistID($connection, $storageID, 'StorageID', '`storage`');
            if($hasGroupID  and $hasStorageID){                
                $description = $description == NULL ? 'NULL' : "'$description'";
                $query = "INSERT IGNORE INTO tool (Name, Quality, Description, GroupID, StorageID) ";
                $query .= "VALUES (\"$name\", \"$quality\",  $description, $groupID, $storageID);";
                checkQuery($connection, $query, $name);
            }
        }
    }
?>