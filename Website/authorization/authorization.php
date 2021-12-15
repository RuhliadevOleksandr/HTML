<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="../style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <title>Облік заводського інвентаря</title>
    </head>
    
    <body>
        <div class="title">
            <p class="large">ОБЛІК ЗАВОДСЬКОГО ІНВЕНТАРЯ</p>
        </div>
        <header class="menu">
            <ul id="leftMenu">
                <li><a href="#">Облік</a>
                    <ul>
                        <li><a name='dropDown' href="../storage.php">Деталі на складі</a></li>
                        <li><a name='dropDown' href="../accounting.php">Облік підприємства</a></li>
                        <li><a name='dropDown' href="../repair.php">Необхідний ремонт</a></li>
                    </ul>
                </li>  
                <li><a href="#">Особи з правом доступу</a></li>
                <li><a href="./authorization.php" id="auth">Авторизація</a></li>
        </header>
        <div class="infoArea">
            <div id='leftArea' class="upper"><p style="text-align: center;">
                <div><form method="POST" action="login.php">
                    <p><b>Оберіть посаду:</b></p><br>
                    
                    <input type="radio" name="occupation" id="radio_1" value="keeper" <?php if (!empty($_SESSION) and $_SESSION['occupation'] == 'keeper') echo 'checked'; ?>>
                    <label for="radio_1">Комірник</label><br>
                    <input type="radio" name="occupation" id="radio_2" value="accountant" <?php if (!empty($_SESSION) and $_SESSION['occupation'] == 'accountant') echo 'checked'; ?>>
                    <label for="radio_2">Бухгалтер</label><br>

                    <p><b>Введіть логін:</b><br>
                        <input type="text" name="login" autocomplete="off"     value="<?php if (!empty($_SESSION)) echo $_SESSION['login']?>">
                    </p>
                    <p><b>Введіть пароль:</b><br>
                        <input type="text" name="password" autocomplete="off"  value="<?php if (!empty($_SESSION)) echo $_SESSION['password']?>">
                    </p>
                    <input type="submit" name="logIn" value="Увійти в систему">
                    <input type="submit" name="logIn" value="Деавторизуватися" formaction="logout.php">
                </form></div>
            </div>
        
            <div id='rightArea' class="bottom">
                <h2>Статус авторизації</h2>
                <p><?php
                    if(empty($_SESSION)){
                        echo "Ви не авторизувалися або ввели не всі дані.";
                    } 
                    else if($_SESSION['occupation']=="keeper"){
                        echo "Ви авторизувалися, ".$_SESSION['login'].". Ваша спеціалізація: комірник.";
                    }
                    else if($_SESSION['occupation']=="accountant"){
                        echo "Ви авторизувалися, ".$_SESSION['login'].". Ваша спеціалізація: бухгалтер.";
                    }
                ?>
                <form action="../index.php"><input type="submit" value="Повернутися на головну сторінку" ></form>
            </div>
        </div>
    </body>
</html>