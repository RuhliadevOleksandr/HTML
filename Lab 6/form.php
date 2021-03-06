<!DOCTYPE html>
<html>
<head>
    <title>LAB6</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>
            ЗВІТИ З ЛАБОРАТОРНИХ РОБІТ <br>
            З ДИСЦИПЛІНИ «ІНТЕРНЕТ-ТЕХНОЛОГІЇ ТА ПРОЕКТУВАННЯ WEB-ЗАСТОСУВАНЬ»
        </h1>
        <h2>
            БРИГАДА <span style="text-decoration: underline;">№8</span>Студенти групи ІС-02 
            <span style="text-decoration: underline;">Галактіонов Максим, Педь Олександра, Рухлядєв Олександр, Юнак Микита</span>  
            <span style="background:yellow; margin-left:20px; font-size:30px"><a href="../Lab 1/lab1_photo.html">Фото студентів</a></span>
        </h2>
        <nav>
            <div><a href="../Lab 1/lab1_p1.html">Лабораторна робота №1</a></div>
            <div><a href="../Lab 2/lab2_p1.html">Лабораторна робота №2</a></div>
            <div><a href="../Lab 3/lab3_p1.html">Лабораторна робота №3</a></div>
            <div><a href="../Lab 4/lab4_p1.html">Лабораторна робота №4</a></div>
            <div><a href="../Lab 5/lab5_p1.html">Лабораторна робота №5</a></div>
            <div class="selected"><a href="#">Лабораторна робота №6</a></div>
            <div><a href="../Lab 7/main.html">Лабораторна робота №7</a></div>
            <div><a href="../Lab 8/main.html">Лабораторна робота №8</a></div>
            <div><a href="../Lab 9/main.html">Лабораторна робота №9</a></div>
        </nav>
    </header>

    <main>
        <aside>

        <div  style="line-height: 20px;">
                <a href="main.html">Тема та Постановка задачі Лабораторної роботи №6  Посилання  на GitHub</a>
            </div>
            <div>
                <a href="dynamic_elements.html">Динамічні елементи 3 пункту</a>
            </div>
            <div>
                <a href="install_server.html">Установка WEB-серверу</a>
            </div>
            <div class="small_container">
                <a href="web_site.html">Запит для перегляду</a>
            </div>
            <div class="small_container">
                <a href="using_utf-8.html">Кодування utf-8</a>
            </div>
            <div class="selected">
                <a href="#">Зворотній зв’язок. Відображення дати</a>
            </div>
            <div>
                <a href="summary.html">ВИСНОВКИ</a>

            </div>
        </aside>

        <div id="container">
            <h3>Форма</h3>
            <?php
                $isSubmited = false;
                $first_name = $last_name = $date = '';
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!empty($_POST["fname"])) 
                    {
                        $first_name = ($_POST["fname"]);
                    } 
                    if (!empty($_POST["lname"])) 
                    {
                        $last_name = ($_POST["lname"]);
                    }
                    $isSubmited = true;
                    $date = date("m.d.y");
                }
            ?>
            <div style="text-align: center";>
		        <form method="post" name="reg" action="">
			        <p>First name: </p>
			        <input type="text" name="fname" size="40" value="<?php echo $first_name;?>">
			        <p>Last name: </p>
			        <input type="text" name="lname" size="40" value="<?php echo $last_name;?>">
                    <br><br>
			        <input type="submit" name="button" >
		        </form>
            </div>
            <?php
                if($isSubmited)
                {
                    echo "<h3>Ви вказали:</h3>";
                    echo "<div style=\"text-align: center\";>";
                    echo "<p>"."$first_name"."</p>";
                    echo "<p>"."$last_name"."</p>";
                    echo "<p>"."$date"."</p>";
                    echo "</div>";
                }
            ?>
            <iframe class="forcode"  src="Code/form.txt" frameborder="0"></iframe> 
        </div>
    </main>
</body>
</html>