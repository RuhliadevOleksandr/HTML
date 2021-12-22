<?php 
    session_start();
    if($_SESSION['occupation']!='keeper'){
        header('Location: authorization/failed.php');
    }
?>
<html>
    <head>
        <style> .error {color: #f00;} </style>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../Lab 5/Tasks/DynamicElements/jquery-ui.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    </head>
    <body>
        <div class="title">
            <p class="large">ОБЛІК ЗАВОДСЬКОГО ІНВЕНТАРЯ</p>
        </div>
        <header class="menu">
            <ul id="leftMenu">
                <li><a href="#">Облік</a>
                    <ul>
                        <li><a name='dropDown' href="storage.php">Деталі на складі</a></li>
                        <li><a name='dropDown' href="accounting.php">Облік підприємства</a></li>
                        <li><a name='dropDown' href="repair.php">Необхідний ремонт</a></li>
                    </ul>
                </li>  
                <li><a href="#">Особи з правом доступу</a></li>
                <li><a href="authorization/authorization.php" id="auth">Авторизація</a></li>
        </header>
        <script>
            function show(){
                var indexInTable = -1;
                var table = document.getElementById('showResult');
                var toolName = document.getElementById("toolName").value;
                var storageName = document.getElementById("storageName").value;
                for (var i = 0, n = table.rows.length; i < n; i++) {
                    if(table.rows[i].cells[0].innerHTML == toolName){
                        indexInTable = i;
                    }
                }
                if(indexInTable == -1)
                    table.insertAdjacentHTML('beforeend', '<tr><th>'+toolName+'</th><th>'+storageName+'</th></tr>');
                else
                    table.rows[indexInTable].cells[1].innerHTML = storageName;
            }
            function addBrakeTool(){  
                var div = document.getElementById('addResult');
                if(div.querySelectorAll(".error").length > 0)
                        div.querySelectorAll(".error").forEach(e => e.remove());
                if( document.getElementById("toolName").value != "" && document.getElementById("storageName").value != ""){
                    $.post('dataProcessing/submit.php', $('#add').serialize(), function(data) { if(!data.includes('error')){show();}$("#addResult").html(data) });
                }
                else{
                    div.insertAdjacentHTML('beforeend', '<span class="error">Tool and storage names must be initialize!</span>');
                }
                return false; 
            } 
        </script>
        <div class="infoArea">
             <div id='leftArea' class="upper"><p style="text-align: center;">
                <h2>Деталі на складі і їх стан</h2>
                <form id="add" onsubmit="return addBrakeTool()">
                    <h4><u>Інструменти які потребують ремонту</u></h4>
                    <h5>Інструмент:</h5>
                    <p><input class="int" type="text" name="toolName" id="toolName"></p>
                    <h5>Назва складу:</h5>
                    <p><input class="int" type="text" name="storageName" id="storageName"></p>
                    <p><input class="button" type="submit" name="Submit" value='На ремонт'></p>
                </form>
                <div id="addResult"></div>
                <form action="index.php"><input type="submit" value="Повернутися на головну сторінку" ></form>
            </div>
            <div id='rightArea' class="bottom"><p style="text-align: center;">
                <h2>Деталі, що потребують ремонту</h2>
                <table id="showResult"></table>
            </div>
            <script> $.post('dataProcessing/submit.php', "show=\"true\"", function(data) { $("#showResult").html(data) }); </script>
        </div>
    </body>
</html>