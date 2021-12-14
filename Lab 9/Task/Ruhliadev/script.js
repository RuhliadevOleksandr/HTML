$(function() {
    $.get("data.xml", function(xml){ 
        $(xml).find('note').each(function(){
            showAddedNote($(this).find('tema').text(), $(this).find('text').text(), $(this).find('date').text());
        })
    })
})

function showNote(index) {
    var notes = document.querySelectorAll(".note");
    if (notes[index].style.display === "none") {
        notes[index].style.display = "block";
    } else {
        notes[index].style.display = "none";
    }
}

function showAddedNote(tema, text, date = new Date().toLocaleString()){
    var div = document.getElementById('container');
    var index = document.querySelectorAll(".note").length;
    div.insertAdjacentHTML('beforeend', '<h2 onclick=\"showNote(' + index + ')\">'+ tema + '</h2>');
    div.insertAdjacentHTML('beforeend', '<div class=\"note\"></div>');
    notes = document.querySelectorAll(".note");
    notes[index].insertAdjacentHTML('beforeend', '<p>'+ text + '</p>');
    notes[index].insertAdjacentHTML('beforeend', '<p>'+ date + '</p>');
    notes[index].insertAdjacentHTML('beforeend', '<input type="button" value="Delete Note" onclick=\"deleteNote(\'' + index + '\')\">');
}

function hideDeletedNote(index){
    var div = document.getElementById('container');
    var notes = div.querySelectorAll(".note");
    var temas = div.querySelectorAll("h2");
    notes[index].remove();
    temas[index].remove();
}