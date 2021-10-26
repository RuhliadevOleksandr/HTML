let btn1 = document.getElementById('add')
let btn2 = document.getElementById('result')

btn1.addEventListener('click',createA)
btn2.addEventListener('click',createB)

const ArrA = [];
const ArrB = [];

function createA()
{
    let ammount = document.getElementById('first').value
    for(let i=0; i<ammount; i++)
    {
        ArrA.push(parseInt(Math.random()*100))
    }
    addItem(ArrA.join())
}

const maxArrA = Math.max.apply(null, ArrA)

function createB()
{
    const maxArrA = Math.max.apply(null, ArrA)
    for(let num of ArrA)
    {
        ArrB.push(maxArrA*num)
    }
    addItem(ArrB.join())
    insertionSort()
    addItem(ArrB.join())
}

function insertionSort()
{
    let ammount = document.getElementById('first').value
    for(let i=0; i<ammount; i++)
    {
        const current = ArrB[i];
        let j = i;
        while (j > 0 && ArrB[j - 1] < current) {
            ArrB[j] = ArrB[j - 1];
            j--;
        }
        ArrB[j] = current;
    }
}

function addItem(text)
{
    let area1 = document.querySelector('.area1')
    let div = document.createElement('div')
    div.innerHTML = text
    area1.appendChild(div)
}

