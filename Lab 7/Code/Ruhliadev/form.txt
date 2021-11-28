<!DOCTYPE html>
<html>
<head>
    <title>LAB7</title>
    <meta charset="utf-8">
    <style> .error {color: #FF0000;} </style>
</head>
<body>
    <div>
        <h2>Photographer</h2>
        <p><span class="error">* required field</span></p>
        <form method="post" name="reg" action="">
            <p>Full name: <input type="text" name="fullName" size="40"><span class="error"> *</span></p>
            <p>Date of birth: <input type="text" name="dateOfBirth" size="40"><span class="error"> *</span></p>
            <input type="submit" name="submit" >
        </form>
        <?php
            include 'add_data.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $connection = new mysqli("localhost", "root", null, "photoarchive") or die ("Could not connect:");
                if(!empty($_POST["fullName"]) and !empty($_POST["dateOfBirth"])){
                    addPhotographer($_POST["fullName"], $_POST["dateOfBirth"], $connection);
                }
                else
                    echo "<span class='error'>"."Full name and date of birth must be initialize!"."<span>";
                $connection->close();
            }
        ?>
    </div>
    <div>
        <h2>Studio</h2>
        <p><span class="error">* required field</span></p>
        <form method="post" name="reg" action="">
            <p>Name: <input type="text" name="studioName" size="40"><span class="error"> *</span></p>
            <p>Adress: <input type="text" name="studioAdress" size="40"><span class="error"> *</span></p>
            <input type="submit" name="submit" >
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $connection = new mysqli("localhost", "root", null, "photoarchive") or die ("Could not connect:");
                if(!empty($_POST["studioName"])){
                    addStudio($_POST["studioName"], $_POST["studioAdress"], $connection);
                }
                else
                    echo "<span class='error'>"."Studio name and adress must be initialize!"."<span>";
                $connection->close();
            }
        ?>
    </div>
    <div>
        <h2>Storage</h2>
        <p><span class="error">* required field</span></p>
        <form method="post" name="reg" action="">
            <p>Name: <input type="text" name="storageName" size="40"><span class="error"> *</span></p>
            <p>Adress: <input type="text" name="storageAdress" size="40"><span class="error"> *</span></p>
            <input type="submit" name="submit" >
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $connection = new mysqli("localhost", "root", null, "photoarchive") or die ("Could not connect:");
                if(!empty($_POST["storageName"])){
                    addStorage($_POST["storageName"], $_POST["storageAdress"], $connection);
                }
                else
                    echo "<span class='error'>"."Storage name and adress must be initialize!"."<span>";
                $connection->close();
            }
        ?>
    </div>
    <div>
        <h2>Photo</h2>
        <p><span class="error">* required field</span></p>
        <form method="post" name="reg" action="">
            <p>Name: <input type="text" name="photoName" size="40"><span class="error"> *</span></p>
            <p>Tema: <input type="text" name="photoTema" size="40"><span class="error"> *</span></p>
            <p>Date of creating: <input type="text" name="dateOfCreating" size="40"></p>
            <p>Description: <input type="text" name="description" size="40"></p>
            <p>Studio id: <input type="number" name="photoStudioID" size="40"></p>
            <p>Photographer id: <input type="number" name="photographerID" size="40"></p>
            <p>Storage id: <input type="number" name="storageID" size="40"><span class="error"> *</span></p>
            <input type="submit" name="submit" >
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $connection = new mysqli("localhost", "root", null, "photoarchive") or die ("Could not connect:");
                if(!empty($_POST["photoName"])){
                    addPhoto($_POST["photoName"], $_POST["photoTema"], $_POST["dateOfCreating"], $_POST["description"], $_POST["photoStudioID"], $_POST["photographerID"], $_POST["storageID"], $connection);
                }
                else
                    echo "<span class='error'>"."Photo name, tema and storageID must be initialize!"."<span>";
                $connection->close();
            }
        ?>
    </div>
</body>
</html>