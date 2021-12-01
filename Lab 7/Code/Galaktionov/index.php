<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>index.php</title>
</head>
<body>

<?php
    include 'connection.php';
    include 'functions.php';
?>

<h2>Всі фільми, що наявні у фільмотеці:</h2>
<table>
    <tr>
        <th class="tablehead">Назва</th>
        <th class="tablehead">Рік випуску</th>
        <th class="tablehead">Опис</th>
    </tr>
    <?php
        $all_films = get_all_films($con);
        add_table_rows($all_films);
    ?>
</table>
<h3>Пошук фільму</h3>
<form action="submit.php" method="post">
 
 
 <p><input type="radio" name="searchType" value="byName" />За назвою<br> 
    <span>Назва фільму: <input type="text" name="filmName"></span><br>
    
    <input type="radio" name="searchType" value="byYear" />За роком випуску <br>
    <span>
        <select name="filmYear" size="1">
            <?php add_year_list($con);?>
            
        </select>
    </span><br>

    <input type="radio" name="searchType" value="byStudio" />За студією <br></p>
    <span>
        <select name="filmStudio" size="1">
            <?php add_studio_list($con);?>
        </select>
    </span><br>

    <p><input type="submit" name="submit"/></p>
</form>
<h3>Додати фільм</h3>
<form action="submit_new.php" method="post">
    <span>Назва фільму: <input type="text" name="newFilmName"></span><br>
    <span>Рік випуску: <input type="text" name="newFilmYear"></span><br>
    <span>Опис: <input type="text" name="newFilmDiscription"></span><br>
    <p><input type="submit" name="submit_new"/></p>
</form>

<h2>Знайдені фільми:</h2>





</body>
</html>



