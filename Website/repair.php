<?php session_start()?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="/Lab 5/Tasks/DynamicElements/jquery-ui.min.css">
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
        <div class="infoArea">
             <div id='leftArea' class="upper"><p style="text-align: center;">
                <h2>Деталі на складі і їх стан</h2>
                <?php
                    if($_SESSION['occupation']!='keeper'){
                        header('Location: authorization/failed.php');
                    }
                ?>
                <form action="index.php"><input type="submit" value="Повернутися на головну сторінку" ></form>
            </div>
             <div id='rightArea' class="bottom"><p style="text-align: center;">
                <h2>Деталі, що потребують термінового ремонту</h2>
                
            </div>
        </div>

    </body>
</html>