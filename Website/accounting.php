<?php session_start()?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>>
        <title>Облік заводського інвентаря</title>
        <?php
            include 'connect.php';
            include 'all_Write_off.php';
        ?>
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
            <div id='leftArea' class="upper"><h2>Облік Підприємства</h2>
                
                <!-- Тут идет проверка авторизации, если данные некорренктные, то перейти на страницу "неудачной авторизации" -->
                <?php
                    if($_SESSION['occupation']!='accountant'){
                        header('Location: authorization/failed.php');
                    }
                ?>
             
                <form action="add_Write_off.php" method="post" name="function_accounting">
                    <h4><u>Списання інструменту</u></h4>
                    <h5>Інструмент:</h5>
                    <p><input class="int" type="text" name="Name_instrument"></p>
                    <h5>Назва складу:</h5>
                    <p><input class="int" type="text" name="Name_storage"></p>
                    <p><input class="button" type="submit" name="Write_off_New" value='Списання'></p>                            
                </form>
                <h4><u>Всі списані інструменти</u></h4>  
                <table width="100%">
                    <tr>
                            <th class="st">Код інструменту</th>
                            <th class="st">Назва інструменту</th>
                            <th class="st">Стан</th>
                    </tr>
                    <tr></tr>
                    <?php
                         $all_write_of = get_all($connect);
                         add_table($all_write_of);
                    ?>
                </table>
                <form action="index.php"><input type="submit" value="Повернутися на головну сторінку" ></form>
            </div>
            <div id='rightArea' class="bottom"><h2>Результати запиту</h2></div>
        </div>
    </body>
</html>