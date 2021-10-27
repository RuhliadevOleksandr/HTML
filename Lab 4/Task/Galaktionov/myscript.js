length = 10;
function myRandom(mn, mx) { 
    return Math.random() * (mx - mn) + mn; 
}
function myRound(number, afterDot){
    afterDot = Math.pow(10, afterDot);
    return ((Math.floor(number * afterDot)) / afterDot);
}

function printArray(div, arr){
    for(let i =0;i<arr.length;i++){
        div.innerText+=' '+arr[i];
    }
}

function bubbleSort(inputArr){
    let len = inputArr.length;
    for (let i = 0; i < len; i++) {
        for (let j = 0; j < len; j++) {
            if (inputArr[j] > inputArr[j + 1]) {
                let tmp = inputArr[j];
                inputArr[j] = inputArr[j + 1];
                inputArr[j + 1] = tmp;
            }
        }
    }
    return inputArr;
}

function createArrC(A, B){
    let C = [];
    for(let i=0;i<A.length;i++){
        if(A[i]!=B[i]){
            C[i]= myRound((1/(A[i]-B[i])), 2);
        }
        else{
            C[i]=1;
        }
    }
    return C;
}


function getMaxOfArray(numArray) {
    return Math.max.apply(null, numArray);
}
  
function changeWithMax(arr){
    tmp = arr[0];
    i= arr.indexOf(getMaxOfArray(arr));
    console.log(i);
    arr[0]=arr[i];
    arr[i]=tmp;
    return arr;
}


let A = [];
let B = [];

for(let i =0;i<length;i++){
    A.push(myRound(myRandom(0,100),2));
    B.push(myRound(myRandom(0,100),2));
} 

let C = createArrC(A, B);
var div1 = document.querySelector("#div1");
var div2 = document.querySelector("#div2");
var div3 = document.querySelector("#div3");
var div4 = document.querySelector("#div4");
var div5 = document.querySelector("#div5");
printArray(div1, A);
printArray(div2, B);
printArray(div3, C);

C = changeWithMax(C);
printArray(div4, C);

C=bubbleSort(C);
printArray(div5, C);


