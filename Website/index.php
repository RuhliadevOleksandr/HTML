<?php
    if(!empty($_GET['lang'])){
        $lang = $_GET['lang'];
        setcookie("lang", $lang, time()+365*24*60*60);
        $_COOKIE['lang'] = $lang;
    }

    session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    </head>
    <body>
        <div class="language">
            <a href="?lang=ukr"><img src="language/icon-ukr.png" alt="ukr"></a>
            <a href="?lang=ru"><img src="language/icon-ru.png" alt="ru"></a>    
            <a href="?lang=en"><img src="language/icon-en.png" alt="en"></a>            
        </div>

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
                <h2>Інформаційна панель</h2>
                <?php

                    if(empty($_SESSION)){
                        echo "<p style='color: darkred'>На даний момент ви не авторизовані.</p>";
                    }
                    else if($_SESSION['occupation']=="keeper"){
                        echo "<p class='areaTitle'>Ви авторизовані у системі, ".$_SESSION['login'].". <br>Ваша спеціалізація: комірник.</p>";
                    }
                    else if($_SESSION['occupation']=="accountant"){
                        echo "<p class='areaTitle'>Ви авторизовані у системі, ".$_SESSION['login'].". <br>Ваша спеціалізація: бухгалтер.</p>";
                    } 
                    
                    switch($_COOKIE['lang']){
                        case "ukr":
                            echo "<p>Обрана мова: <span style='color:green'>Українська</span></p>";
                            break;
                        case "ru":
                            echo "<p>Обрана мова: <span style='color:green'>Російська</span></p>";
                            break;
                        case "en":
                            echo "<p>Обрана мова: <span style='color:green'>Англійська</span></p>";
                            break;    
                        default:
                            echo "<p>Обрана мова: <span style='color:green'>Українська</span></p>";
                            break;
                    }
                    
                ?>
                <p>Тут виводитимуться основні форми для взаємодії із базою даних.</p>
            </div>
             <div id='rightArea' class="bottom"><p style="text-align: center;">
                <h2>Статус запитів</h2>
                <p>Тут виводитиметься реузультат взаємодії із сайтом.</p>
            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>