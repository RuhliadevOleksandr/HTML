let int, real, date, pass, pass2;

intB.onclick = function(){
	int = document.getElementById('int').value;
	alert(int);
	return false;
}

realB.onclick = function(){
	real = document.getElementById('real').value;
	alert(real);
	return false;
}

dateB.onclick = function(){
	date = document.getElementById('date').value;
	alert(date);
	return false;
}

pform.onmouseleave = function(){
	pass = document.getElementById('pass').value;
	document.getElementById('passB').disabled = false;
	return false;
}

passB.onclick = function(){
	pass2 = document.getElementById('pass2').value;
	if(pass != pass2){
		document.getElementById('passB').disabled = true;
	} else{
		document.getElementById('passB').disabled = false;
		alert(pass2);
	}
	return false;
}