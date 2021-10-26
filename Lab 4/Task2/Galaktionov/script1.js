let button = document.getElementById('windowButton');
let button1 = document.getElementById('boldButton');
let button2 = document.getElementById('italicButton');
let button3 = document.getElementById('underlineButton');
let button4 = document.getElementById('colorButton');
let button5 = document.getElementById('caseButton');
let styles = [0,0,0,0,0];
let buttons = document.getElementsByClassName('buttons');


button.addEventListener ('click', function(){
    window.open('newWindow.html', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
    let area = document.getElementById('textIn');
    
    localStorage.setItem('text', area.value);
    localStorage.setItem('styles', styles);
})

 for(let i=1;i<6;i++){
    buttons[i].addEventListener ('click', function(){
        if (styles[i-1]==0){
            buttons[i].style.backgroundColor = 'goldenrod';
            styles[i-1] = 1;
        }
        else{
            buttons[i].style.backgroundColor = 'blanchedalmond';
            styles[i-1] = 0;
        }
     })
 }