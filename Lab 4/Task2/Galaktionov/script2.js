function acceptStyles(div1, arrStyles){
    for(let i=0;i<5;i++){
        if(arrStyles[i]==1){
            applyOneStyle(div1, i);
        }
    }
}

function applyOneStyle(div1, i1){
    switch(i1){
        case 0:
            div1.style.fontWeight = 'bold';
            break;
        case 1:
            div1.style.fontStyle = 'italic';
            break;
        case 2:
            div1.style.textDecoration = 'underline';
            break;
        case 3:
            div1.style.color = 'blue';
            break;
        case 4:
            div1.style.textTransform = 'uppercase';
            break;
        
    }
}

let text = localStorage.getItem('text');
let styles = localStorage.getItem('styles');
let div = document.getElementById('output');

styles = styles.split(',').map(function(item) {
return parseInt(item, 10);
});

acceptStyles(div, styles);
div.textContent=text;

