<!DOCTYPE html>
<html>
<head>
    <title>LAB8</title>
    <meta charset="utf-8">
    <?php include 'add_data.php'; ?>
    <style> .error {color: #f00;}  div {display: none;} </style>
</head>
<body>
    <header>
        <nav  style="display: flex; justify-content: space-around;">
            <button onclick="show(0)">Add worker</button>
            <button onclick="show(1)">Add group</button>
            <button onclick="show(2)">Add storage</button>
            <button onclick="show(3)">Add tool</button>
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
            <h2>Worker</h2>
            <p><span class="error">* required field</span></p>
            <form method="post" name="reg" action="submit.php">
                <p>First name: <input type="text" name="firstName" size="40"><span class="error"> *</span></p>
                <p>Last name: <input type="text" name="lastName" size="40"><span class="error"> *</span></p>
                <input type="submit" name="submitWorker" >
            </form>
        </div>
        <div>
            <h2>Group</h2>
            <p><span class="error">* required field</span></p>
            <form method="post" name="reg" action="submit.php">
                <p>Name: <input type="text" name="groupName" size="40"><span class="error"> *</span></p>
                <input type="submit" name="submitGroup" >
            </form>
        </div>
        <div>
            <h2>Storage</h2>
            <p><span class="error">* required field</span></p>
            <form method="post" name="reg" action="submit.php">
                <p>Name: <input type="text" name="storageName" size="40"><span class="error"> *</span></p>
                <p>Adress: <input type="text" name="storageAdress" size="40"><span class="error"> *</span></p>
                <input type="submit" name="submitStorage" >
            </form>
        </div>
        <div>
            <h2>Tool</h2>
            <p><span class="error">* required field</span></p>
            <form method="post" name="reg" action="submit.php">
                <p>Name: <input type="text" name="toolName" size="40"><span class="error"> *</span></p>
                <p>
                    Quality: 
                    <input type="radio" name="quality" value="new" checked/>New 
                    <input type="radio" name="quality" value="used" />Used 
                    <input type="radio" name="quality" value="brake" />Brake
                    <span class="error"> *</span>
                </p>
                <p>Description: <input type="text" name="description" size="40"></p>
                <p>Group id: <input type="number" name="groupID" size="40"><span class="error"> *</span></p></p>
                <p>Storage id: <input type="number" name="storageID" size="40"><span class="error"> *</span></p>
                <input type="submit" name="submitTool" >
            </form>
        </div>
    </main>
</body>
</html>