<?php
$connection = new mysqli("localhost", "root", null, "photoarchive") or die ("Could not connect:");

$FullName = ["Mykyta Wasyl Gavrilyuk", "Vasylyna Nadiya Vasylyshyn", "Ofeliya Sofron Sobol", "Yuriy Liubov Antonov", "Oksana Emiliya Boyko"];
$DateOfBirth = ["1898-01-30", "1952-01-04", "1926-07-24", "1947-02-19", "1963-08-01"];
$studioName = ["Orchardside", "Primroselands", "Fifi's Studio", "Pearlands", "Nicolette's Studio"];
$studioAdress = ["Avon Knoll, 7", " Llys Ial, 5", "Hastings Hill, 22", "Chaplain's Hill, 13", " Avon Mill, 2"];
$storageName = ["Central", "Southern", "Northern"];
$storageAdress = ["Baxter Street, 10", "Primroses, 3", "Dosk Place, 17"];
$photoName = ["Sunrise", "2783873img", "78227img", "Seaside", "Match"];
$photoTema = ["Nature", "People", "People", "Nature", "Football"];
$DateOfCreating = ["1960-02-11", NULL, NULL, "1993-02-01", "1979-04-27"];
$Annotation = ["Sunrise in Nepal", NULL, NULL, "Mediterranean sea", "Football match 1979-04-27"];
$photoStudioID = ['NULL', 1, 'NULL', 5, 2];
$photographerID = [3, 'NULL', 'NULL', 2, 4];
$storageID = [2, 3, 3, 1, 2];

function checkQuery($connection, $query){
    if ($connection->query($query) === FALSE)
        echo "Error: " . $query . "<br>" . $connection->error . "<br>";
}

$query = "";
for($i = 0; $i < count($FullName); $i++){
    $query = "INSERT IGNORE INTO photographer (FullName, DateOfBirth) VALUES (\"$FullName[$i]\", \"$DateOfBirth[$i]\");";
    checkQuery($connection, $query);
}
echo "<p>"."Data about photographers was successfully add to DB!"."<p>";


$query = "";
for($i = 0; $i < count($studioName); $i++){
    $query = "INSERT IGNORE INTO photostudio (StudioName, Adress) VALUES (\"$studioName[$i]\", \"$studioAdress[$i]\");";
    checkQuery($connection, $query);
}
echo "<p>"."Data about studios were successfully add to DB!"."<p>";

$query = "";
for($i = 0; $i < count($storageName); $i++){
    $query = "INSERT IGNORE INTO photostorage (StorageName, Adress) VALUES (\"$storageName[$i]\", \"$storageAdress[$i]\");";
    checkQuery($connection, $query);
}
echo "<p>"."Data about storages were successfully add to DB!"."<p>";


$query = "";
for($i = 0; $i < count($photoName); $i++){
    $query = "INSERT IGNORE INTO photo (PhotoName, Tema, DateOfCreating, Annotation, PhotoStudioID, PhotographerID, StorageID)";
    $query .= " VALUES (\"$photoName[$i]\", \"$photoTema[$i]\", " . ($DateOfCreating[$i]==NULL ? "NULL" : "'$DateOfCreating[$i]'") . ",";
    $query .= " " . ($Annotation[$i]==NULL ? "NULL" : "'$Annotation[$i]'") . ", $photoStudioID[$i], $photographerID[$i], $storageID[$i]);";
    checkQuery($connection, $query);
}
echo "<p>"."Data about photos were successfully add to DB!"."<p>";

$connection->close();
?>