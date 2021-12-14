<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Компьютерная техника</title>
  <style>
      body {
    background-image: url(фон.jpg);
    background-repeat: repeat;
    background-size: cover;
    font-family: Arial;
    }
    div {margin: auto;}
    form{
        font-size: 18px;
        text-align: center;
        padding: 5px;
        width: 70%;
        height: auto;
        margin: 100px 0 0 100px;
        background-color: rgb(224, 224, 224);
    }
    .get{ 
        width: 80%;
        font-size: 18px;
        height: 30px;
    }
    form h4 {
        text-align: left;
        margin-left: 40px;
    }
    .button {
        background-color: rgb(240, 131, 42);
        font-size: 18px;
        height: 30px;
        width: 60%;
    }
  </style>
 </head>
 <body>
  <div>
        <form action="add.php" method="post" name="add">
            <h2>Добавление новых елементов</h2>
            <h4>Название:</h4>
            <p><input class="get" type="text" name="Name_instrument"></p>
            <h4>Состояние:</h4>
            <p><input class="get" type="text" name="Condition"></p>
            <h4>Дата:</h4>
            <p><input class="get" type="date" name="Date"></p>
            <h4>Поставщик:</h4>
            <input type="radio" name="Provider" id="1" chacked>
            <label for="1">Hator</label>
            <input type="radio" name="Provider" id="2" chacked>
            <label for="2">Logitech</label>
            <input type="radio" name="Provider" id="3" chacked>
            <label for="3">Razer</label>
            <input type="radio" name="Provider" id="4" chacked>
            <label for="4">LG</label>
            <h4>Вид товара:</h4>
            <input type="radio" name="Product" id="1">
            <label for="1">Клавіатура</label>
            <input type="radio" name="Product" id="2">
            <label for="2">Мишка</label>
            <input type="radio" name="Product" id="3">
            <label for="3">Навушники</label>
            <input type="radio" name="Product" id="4">
            <label for="4">Монітор</label>
            <h4>Характеристика:</h4>
            <p><input class="get" type="text" name="Characteristic"></p>
            <h4>Цена:</h4>
            <p><input class="get" type="text" name="Price"></p><br>
            
            <p><input class="button" type="submit" name="submitButton" value='Добавить'></p>
            <h2>Вывод всех данных</h2>
            <p><input class="button" type="submit" name="all_instruments" value='Вывести данные'></p>
            <h2>Поиск товара</h2>
            <h4>Название:</h4>
            <p><input class="get" type="text" name="Name"></p>
            <p><input class="button" type="submit" name="find" value='Найти'></p>
            
        </form>

  </div>

 </body>
</html>