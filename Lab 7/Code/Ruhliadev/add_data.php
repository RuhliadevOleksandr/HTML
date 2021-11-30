<?php
    function checkQuery($query, $data, $connection){
        if ($connection->query($query) === FALSE)
            echo "<span class='error'>" . "Error: " . $query . "<br>" . $connection->error . "<br>" . "</span>";
        else
            echo "<p>"."Data about $data was successfully add to DB!"."</span>";
    }

    function addPhotographer($fullName, $dateOfBirth, $connection){
        $query = "";
        if(!empty($fullName) and !empty($dateOfBirth)){
            $query = "INSERT IGNORE INTO photographer (FullName, DateOfBirth) VALUES (\"$fullName\", \"$dateOfBirth\");";
            checkQuery($query, $fullName, $connection);
        }
        else
            echo "<span class='error'>"."Data about photographer was not add to DB! Full name and date of birth must be initialize!"."</span>";
    }

    function addStudio($studioName, $studioAdress, $connection){
        $query = "";
        if(!empty($studioName) and !empty($studioAdress)){
            $query = "INSERT IGNORE INTO photostudio (StudioName, Adress) VALUES (\"$studioName\", \"$studioAdress\");";
            checkQuery($query, $studioName, $connection);
        }
        else
            echo "<span class='error'>"."Data about studio was not add to DB! Studio name and adress must be initialize!"."</span>";
    }

    function addStorage($storageName, $storageAdress, $connection){
        $query = "";
        if(!empty($storageName) and !empty($storageAdress)){
            $query = "INSERT IGNORE INTO photostorage (StorageName, Adress) VALUES (\"$storageName\", \"$storageAdress\");";
            checkQuery($query, $storageName, $connection);
        }
        else
            echo "<span class='error'>"."Data about storage was not add to DB! Storage name and adress must be initialize!"."</span>";
    }

    function checkIfEmptyNumber($number){
        $number = $number == NULL ? 'NULL' : $number;
        return $number;
    }

    function checkIfEmptyData($data){
        $data = $data == NULL ? 'NULL' : "'$data'";
        return $data;
    }

    function addPhoto($photoName, $photoTema, $dateOfCreating, $description, $photoStudioID, $photographerID, $storageID, $connection){
        $query = "";
        if(!empty($photoName) and !empty($photoTema) and !empty($storageID)){
            $photoStudioID = checkIfEmptyNumber($photoStudioID);
            $photographerID = checkIfEmptyNumber($photographerID);
            $dateOfCreating = checkIfEmptyData($dateOfCreating);
            $description = checkIfEmptyData($description);
            $query = "INSERT IGNORE INTO photo (PhotoName, Tema, DateOfCreating, Description, PhotoStudioID, PhotographerID, StorageID) ";
            $query .= "VALUES (\"$photoName\", \"$photoTema\", $dateOfCreating,  $description, $photoStudioID, $photographerID, $storageID);";
            checkQuery($query, $photoName, $connection);
        }
        else
            echo "<span class='error'>"."Data about photo was not add to DB! Photo name, tema and storageID must be initialize!"."</span>";
    }
?>