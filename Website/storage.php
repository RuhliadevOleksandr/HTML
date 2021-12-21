<?php 
    session_start();
    include 'storage_queries/connection.php';
    include 'storage_queries/functions.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="title">
            <p class="large">ОБЛІК ЗАВОДСЬКОГО ІНВЕНТАРЯ</p>
        </div>
        <header class="menu">
            <ul id="LeftMenu">
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
                <h2>Запити для керування складським інвентарем</h2>
                <?php
                    if($_SESSION['occupation']!='keeper'){
                        header('Location: authorization/failed.php');
                    }
                ?>
                <p>Тут відображені основні форми для взаємодії із базою даних.</p>
                        
                <form action="storage_queries/add.php" method="post" name="add">
                    <h4><u>Передача в експлуатацію</u></h4>
                    <h5>Інструмент:</h5>
                    <span>
                        <select name="tool_name" size="1">
                            <?php add_tool_list_to_exp($con);?>
                        </select>
                    </span><br>
                    <h5>Матеріально відповідальна особа:</h5>
                    <p><input class="int" type="text" name="LastName">
                    <input class="int" type="text" name="FirstName"></p>

                    <p><input class="button" type="submit" name="submitButton" value='Передача в експлуатацію'></p>
                </form>

                <form action="storage_queries/delete.php" method="post" name="delete">
                    <h4><u>Повернення на склад</u></h4>

                    <h5>Інструмент:</h5>
                    <span>
                        <select name="tool_name" size="1">
                            <?php add_tool_list_to_storage($con);?>
                        </select>
                    </span><br>

                    <h5>Стан:</h5>
                    <p><input type="radio" name="Quality" id="1" value="new"></p>
                    <label class="rad" for="1">New</label>
                    <p><input type="radio" name="Quality" id="2" value="brake"></p>
                    <label class="rad" for="2">Brake</label>
                    <p><input type="radio" name="Quality" id="3" value="unfit"></p>
                    <label class="rad" for="3">Unfit</label>

                    <p><input style="width: 30px; float:left; height:30px" type="checkbox" name="file_write" id="4" value="Yes"></p>
                    <label for="4">Записувати історію у файл</label>

                    <p><input class="button" type="submit" name="all_instruments" value='Повернення на склад'></p>
                </form>

                <form action="index.php"><input type="submit" value="Повернутися на головну сторінку" ></form>
            </div>


             <div id='rightArea' class="bottom"><p style="text-align: center;">
                <h2>Статус запитів</h2>
                <h3>Інструменти в експлуатації</h3>
                <?php
                    $tools=get_tools_exp($con);
                    display($tools);
                ?>

                <h3>Інструменти на складі</h3>
                <?php
                    $tools=get_tools_storage($con);
                    display($tools);
                ?>
            </div>
        </div>
    </body>
</html>