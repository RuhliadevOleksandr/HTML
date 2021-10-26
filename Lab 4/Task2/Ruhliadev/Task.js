var slides = document.querySelectorAll(".slide");
var currentSlide = 0;
var delay = 5000;
var number = setNumberOfCycles();
var cycleNumber = 0;
var timerId;

function setNumberOfCycles(){ 
    let number = prompt("Enter the number of cycles:");
    while(isNaN(number) || number < 1){
        alert("Times of cycles mustn't be a NaN or less than '0' !")
        number = prompt("Enter the number of cycles:");
    }
    timerId = setInterval(nextSlide, delay);
    return number;
}

function nextSlide(){
    checkIfStop();
	slides[currentSlide].className = "slide";
	currentSlide = (++currentSlide) % slides.length;
	slides[currentSlide].className = "slide showing";
}

function checkIfStop(){
    if (currentSlide == slides.length - 1)
        cycleNumber++;
    if(cycleNumber == number){
        cycleNumber = 0;
        clearInterval(timerId);
        number = setNumberOfCycles();
    }
}

function changeSize() {
    var range = document.getElementById('sizeRange');
    slides.forEach(element => {
        element.style.height = `${range.value * 3.6}px`;
        element.style.top = `${180 - range.value * 1.8}px`;
    })
}

function makeFaster(){
    if(delay - 1000 > 1000){
        delay -= 1000;
        clearInterval(timerId);
        timerId = setInterval(nextSlide, delay);
    }
    else
        alert("The speed can't be faster!");
}

function makeSlower(){
    if(delay + 1000 < 10000){
        delay += 1000;
        clearInterval(timerId);
        timerId = setInterval(nextSlide, delay);
    }
    else
        alert("The speed can't be slower!");
}