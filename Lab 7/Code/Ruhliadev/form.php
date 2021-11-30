<!DOCTYPE html>
<html>
<head>
    <title>LAB7</title>
    <meta charset="utf-8">
    <?php include 'add_data.php'; ?>
    <style> .error {color: #f00;}  div {display: none;} </style>
</head>
<body>
    <header>
        <nav  style="display: flex; justify-content: space-around;">
            <button onclick="show(0)">Add photographer</button>
            <button onclick="show(1)">Add studio</button>
            <button onclick="show(2)">Add storage</button>
            <button onclick="show(3)">Add photo</button>
        </nav>
    </header>
    <main>
        <script>
            function show(index) {
                var forms = document.querySelectorAll("div");
                if (forms[index].style.display === "none") {
                    forms[index].style.display = "block";
                } else {
                    forms[index].style.display = "none";
                }
            }
        </script>
        <div>
            <h2>Photographer</h2>
            <p><span class="error">* required field</span></p>
            <form method="post" name="reg" action="">
                <p>Full name: <input type="text" name="fullName" size="40"><span class="error"> *</span></p>
                <p>Date of birth: <input type="text" name="dateOfBirth" size="40"><span class="error"> *</span></p>
                <input type="submit" name="submit" >
            </form>
        </div>
        <div>
            <h2>Studio</h2>
            <p><span class="error">* required field</span></p>
            <form method="post" name="reg" action="">
                <p>Name: <input type="text" name="studioName" size="40"><span class="error"> *</span></p>
                <p>Adress: <input type="text" name="studioAdress" size="40"><span class="error"> *</span></p>
                <input type="submit" name="submit" >
            </form>
        </div>
        <div>
            <h2>Storage</h2>
            <p><span class="error">* required field</span></p>
            <form method="post" name="reg" action="">
                <p>Name: <input type="text" name="storageName" size="40"><span class="error"> *</span></p>
                <p>Adress: <input type="text" name="storageAdress" size="40"><span class="error"> *</span></p>
                <input type="submit" name="submit" >
            </form>
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
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<br>";
                $connection = new mysqli("localhost", "root", null, "photoarchive") or die ("Could not connect:");
                if(isset($_POST["fullName"]) or isset($_POST["dateOfBirth"])){
                    addPhotographer($_POST["fullName"], $_POST["dateOfBirth"], $connection);
                }
                if(isset($_POST["studioName"]) or isset($_POST["studioAdress"])){
                    addStudio($_POST["studioName"], $_POST["studioAdress"], $connection);
                }
                if(isset($_POST["storageName"]) or isset($_POST["storageAdress"])){
                    addStorage($_POST["storageName"], $_POST["storageAdress"], $connection);
                }
                if(isset($_POST["photoName"]) or isset($_POST["photoTema"]) or isset($_POST["storageID"])){
                    addPhoto($_POST["photoName"], $_POST["photoTema"], $_POST["dateOfCreating"], $_POST["description"], $_POST["photoStudioID"], $_POST["photographerID"], $_POST["storageID"], $connection);
                }
                $connection->close();
            }
        ?>
    </main>
</body>
</html>