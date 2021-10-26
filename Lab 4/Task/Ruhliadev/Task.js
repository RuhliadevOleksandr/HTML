function main(){
    const massive = InitMassive();
    console.log("Massive: ", massive);
    let {oddMassive, evenMassive} = IntoOddAndEvenMassives(massive);
    console.log("Odd massive: ", oddMassive);
    ShowMinMaxOfMassive(oddMassive);
    console.log("Even massive: ", evenMassive);
    ShowMinMaxOfMassive(evenMassive);
    PrintMassive("Massive: ", massive);
    InsertionSort(massive);
    PrintMassive("Sorted massive: ", massive);
}

function PrintMassive(name, massive){
    document.write(name);
    for (let i = 0; i < massive.length - 1; i++) {
        document.write(massive[i], "; ")
    }
    document.write(massive[massive.length - 1], ".<br/>")
}

function InitMassive(){
    let massiveLength = prompt("Enter massive length:");
    while(isNaN(massiveLength) || massiveLength < 1){
        alert("Massive length mustn't be NaN or less than '0'!")
        massiveLength = prompt("Enter massive length:");
    }
    const massive = new Array(massiveLength);
    for(let i = 0; i < massiveLength; i++){
        massive[i] = getRandomInt(10);
    }
    return massive;
}

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}

function IntoOddAndEvenMassives(massive){
    const oddMassive = [];
    const evenMassive = [];
    for(let i = 0; i < massive.length; i++){
        if (i % 2) {
            evenMassive.push(massive[i])
        }
        else{
            oddMassive.push(massive[i])
        }
    }
    return {oddMassive, evenMassive};
}

function MaxElement(massive) {
    let max = massive[0];
    for (let i = 1; i < massive.length; i++) {
        if (max < massive[i]) {
            max = massive[i];
        }
    }
    return max;
}

function MinElement(massive) {
    let min = massive[0];
    for (let i = 1; i < massive.length; i++) {
        if (min > massive[i]) {
            min = massive[i];
        }
    }
    return min;
}

function ShowMinMaxOfMassive(massive){
    console.log("Min: ", MinElement(massive));
    console.log("Max: ", MaxElement(massive));
}

function InsertionSort(massive){
    for (let i = 0; i < massive.length; i++)
    {
        let temp = massive[0];
        for (let j = i + 1; j < massive.length; j++)
        {
            if (massive[i] < massive[j])
            {
                temp = massive[i];
                massive[i] = massive[j];
                massive[j] = temp;
            }
        }
    }
}

main();