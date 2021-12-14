<?php session_start()?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="/Lab 5/Tasks/DynamicElements/jquery-ui.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
        <!-- <script type="text/javascript">
            let now = new Date();
            alert("Сайт створено для обліку складського інвентаря. Сьогоднішня дата: "+now.toLocaleDateString());
        </script>
        <title>Облік заводського інвентаря</title>
        <script type="text/javascript">
            alert("Сайт створено для обліку складського інвентаря");
        </script>
        <script>
            $(document).ready( function() {
              $('#LeftMunu').menu();
            } );
          </script> -->
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
                <h2>Інформаційна панель</h2>
                <?php
                    if($_SESSION['occupation']=="keeper"){
                        echo "<p class='areaTitle'>Ви авторизовані у системі, ".$_SESSION['login'].". <br>Ваша спеціалізація: комірник.</p>";
                    }
                    else if($_SESSION['occupation']=="accountant"){
                        echo "<p class='areaTitle'>Ви авторизовані у системі, ".$_SESSION['login'].". <br>Ваша спеціалізація: бухгалтер.</p>";
                    }
                    else if(empty($_SESSION)){
                        echo "<p style='color: darkred'>На даний момент ви не авторизовані.</p>";
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