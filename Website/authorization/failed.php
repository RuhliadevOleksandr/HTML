<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        p{
            font-size: 50px;
            color: darkred;
            font-family: Arial, Helvetica, sans-serif;
        }
        div{
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            background-color: #BC92AC;
        }
    </style>

</head>
<body>
    <div>
        <!-- <p>Оскільки ви не авторизувалися як бухгалтер, то вам відмовлено у доступі до обліку підприємства.</p> -->
        <p>
            <?php
                if(empty($_SESSION)){
                    echo "Оскільки ви не авторизувалися, то вам відмовлено у доступі до будь-яких розділів.";
                }
                else if($_SESSION['occupation']!='accountant'){
                    echo "Оскільки ви не авторизувалися як бухгалтер, то вам відмовлено у доступі до обліку підприємства.";
                }
                else if($_SESSION['occupation']!='keeper'){
                    echo "Оскільки ви не авторизувалися як комірник, то вам відмовлено у доступі до обліку інтрементів на складі.";
                }
            ?>
        </p>
    </div>
    <form action="../index.php"><input type="submit" value="Повернутися на головну сторінку" ></form>
</body>
</html>