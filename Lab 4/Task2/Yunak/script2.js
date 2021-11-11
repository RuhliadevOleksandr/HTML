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


passB.onclick = function(){
	pass2 = document.getElementById('pass2').value;
	pass = document.getElementById('pass').value;
	if(pass == pass2){
		alert("Passwords are equal");
	} else{
		alert("Passwords are not equal");
	}
	return false;
}