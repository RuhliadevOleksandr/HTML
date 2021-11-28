<?php
    function checkQuery($query, $data, $connection){
        if ($connection->query($query) === FALSE)
            echo "Error: " . $query . "<br>" . $connection->error . "<br>";
        else
            echo "<p>"."Data about $data was successfully add to DB!"."<p>";
    }

    function addPhotographer($fullName, $dateOfBirth, $connection){
        $query = "";
        if(!empty($fullName) and !empty($dateOfBirth)){
            $query = "INSERT IGNORE INTO photographer (FullName, DateOfBirth) VALUES (\"$fullName\", \"$dateOfBirth\");";
            checkQuery($query, $fullName, $connection);
        }
        else
            echo "<p>"."Data about photographer was not add to DB! Full name and date of birth must be initialize!"."<p>";
    }

    function addStudio($studioName, $studioAdress, $connection){
        $query = "";
        if(!empty($studioName) and !empty($studioAdress)){
            $query = "INSERT IGNORE INTO photostudio (StudioName, Adress) VALUES (\"$studioName\", \"$studioAdress\");";
            checkQuery($query, $studioName, $connection);
        }
        else
            echo "<p>"."Data about studio was not add to DB! Studio name and adress must be initialize!"."<p>";
    }

    function addStorage($storageName, $storageAdress, $connection){
        $query = "";
        if(!empty($storageName) and !empty($storageAdress)){
            $query = "INSERT IGNORE INTO photostorage (StorageName, Adress) VALUES (\"$storageName\", \"$storageAdress\");";
            checkQuery($query, $storageName, $connection);
        }
        else
            echo "<p>"."Data about storage was not add to DB! Storage name and adress must be initialize!"."<p>";
    }

    function checkIfEmpty($data){
        if(empty($data))
            return 'null';
        else
            return $data;
    }

    function addPhoto($photoName, $photoTema, $dateOfCreating, $description, $photoStudioID, $photographerID, $storageID, $connection){
        $query = "";
        if(!empty($photoName) and !empty($photoTema) and !empty($storageID)){
            $photoStudioID = checkIfEmpty($photoStudioID);
            $photographerID = checkIfEmpty($photographerID);
            $query = "INSERT IGNORE INTO photo (PhotoName, Tema, DateOfCreating, Description, PhotoStudioID, PhotographerID, StorageID)";
            $query .= " VALUES (\"$photoName\", \"$photoTema\", " . ($dateOfCreating==NULL ? "NULL" : "'$dateOfCreating'") . ",";
            $query .= " " . ($description==NULL ? "NULL" : "'$description'") . ", $photoStudioID, $photographerID, $storageID);";
            checkQuery($query, $photoName, $connection);
        }
        else
            echo "<p>"."Data about photo was not add to DB! Photo name, tema and storageID must be initialize!"."<p>";
    }
?>