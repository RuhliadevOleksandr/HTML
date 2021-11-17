let menu = document.getElementsByName('dropDown');
let leftArea = document.getElementById('leftArea')
let rightArea = document.getElementById('rightArea')
let counterSuccesful = 0;
let counterDenied = 0;


menu[0].addEventListener('click', function() {
    leftArea.innerHTML='<p class="areaTitle">Список деталей, що присутні зараз на складі:</p>'
    counterSuccesful+=1;
    rightArea.innerHTML+='<p class="areaTitle" style="text-align:left">Запит схвалено: '+counterSuccesful+'</p>';
});

menu[1].addEventListener('click', function() {
    leftArea.innerHTML='<p class="areaTitle" style="color:red;">Відмова у правах доступу:</p>'
    counterDenied+=1;
    rightArea.innerHTML+='<p class="areaTitle" style="color:red;text-align:left">Запит відмовлено: '+counterDenied+'</p>';
});

menu[2].addEventListener('click', function() {
    leftArea.innerHTML='<p class="areaTitle">Список деталей, що потребують ремонту:</p>'
    counterSuccesful+=1;
    rightArea.innerHTML+='<p class="areaTitle" style="text-align:left">Запит схвалено: '+counterSuccesful+'</p>';
});

console.log(menu[0]);
