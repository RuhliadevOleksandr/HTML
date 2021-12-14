<?php session_start()?>
<html>
    <head>
        <link rel="stylesheet" href="/Lab 5/Tasks/DynamicElements/jquery-ui.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
        <title>Облік заводського інвентаря</title>
        <script type="text/javascript"></script>
        <script>
            $(document).ready( function() {
              $('#LeftMunu').menu();
              $( "#selectMenu").selectmenu();
            } );
          </script>
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
            <div id='leftArea' class="upper"><h2>Облік Підприємства</h2>
                
                <!-- Тут идет проверка авторизации, если данные некорренктные, то перейти на страницу "неудачной авторизации" -->
                <?php
                    if($_SESSION['occupation']!='accountant'){
                        header('Location: authorization/failed.php');
                    }
                ?>
             
                <form action="../index.php"><input type="submit" value="Повернутися на головну сторінку" ></form>

                <select id="selectMenu">
                    <option>Оприбуткування</option>
                    <option>Передача в експлуатацію</option>
                    <option>Списання</option>
                </select>
                <form action="index.php"><input type="submit" value="Повернутися на головну сторінку" ></form>
            </div>
            <div id='rightArea' class="bottom"><h2>Результати запиту</h2></div>
        </div>

    </body>
</html>