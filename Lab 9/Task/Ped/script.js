function checkPassword(form) {
    var name = form.name.value;
    //перевірка користувача
    if( name=="111" || name=="abcd" || name=="Педь Олександра" )
    {
        text = "Ім'я користувача використовується";
        $.ajax({
          url: 'Error.php',
          method: 'post',
          data: {text: 'Помилка: імя використовується'}
        })
        alert(text);
        return false;
    }
    
    var password = form.password.value;
    var s_letters = "qwertyuiopasdfghjklzxcvbnm"; // Буквы в нижнем регистре
    var b_letters = "QWERTYUIOPLKJHGFDSAZXCVBNM"; // Буквы в верхнем регистре
    var digits = "0123456789"; // Цифры
    var specials = "!@#$%^&*()_-+=\|/.,:;[]{}"; // Спецсимволы
    var is_s = false;
    var is_b = false;
    var is_d = false;
    var is_sp = false;
    for (var i = 0; i < password.length; i++) {
      /* Проверяем каждый символ пароля на принадлежность к тому или иному типу */
      if (!is_s && s_letters.indexOf(password[i]) != -1) is_s = true;
      else if (!is_b && b_letters.indexOf(password[i]) != -1) is_b = true;
      else if (!is_d && digits.indexOf(password[i]) != -1) is_d = true;
      else if (!is_sp && specials.indexOf(password[i]) != -1) is_sp = true;
    }
    var rating = 0;
    var text = "";
    if (is_s) rating++;
    if (is_b) rating++;
    if (is_d) rating++;
    if (is_sp) rating++;
    if ( rating < 3)
    {
        text = "Легкий";
        $.ajax({
          url: 'Error.php',
          method: 'post',
          data: {text: 'Помилка: занадто легкий пароль'}
        })
        alert(text);
        return false;
    } 
    else if ( rating >= 3 && password.length == 6)
    {
        text = "Середній";
        $.ajax({
          url: 'Error.php',
          method: 'post',
          data: {text: 'Реєстрація прошла успішно. Пароль середньої складності'}
        })
        alert(text);
        return true;
    } 
    else if (  rating >= 3 && password.length > 6) 
    {
        text = "Складний";
        $.ajax({
          url: 'Error.php',
          method: 'post',
          data: {text: 'Реєстрація прошла успішно. Пароль складний'}
        })
        alert(text);
        return true;
    }

    result.open("POST", url, true);
    result.setresultHeader("Content-type", "application/x-www-form-urlencoded");
    result.addEventListener("readystatechange", () => {

      if(result.readyState === 4 && result.status === 200) {       
      console.log(result.responseText);
      }
    });
    result.send(sms);
  }

  var Poland = Array("Варшава", "Краків", "Вроцлав", "Познань", "Люблін");
  var Ukraine = Array("Київ", "Чернігів", "Житомир", "Львів", "Вінниця");
  var Russia = Array("Москва", "Санкт-Петербург", "Єкатеринбург", "Сочі", "Ростов-на-Дону");
  var Belarus = Array("Мінськ", "Гомель", "Могильов", "Вітебськ", "Гродно");

  function showNames(v) {
    var mas = eval(v);
    var el = document.querySelector('#city');
    while (el.childNodes.length > 0) {
      el.removeChild(el.childNodes[el.childNodes.length - 1]);
    }
    for (var i = 0; i < mas.length; i++) {
      var opt = document.createElement("option");
      opt.innerHTML = mas[i];
      el.append(opt);
    }
  }
