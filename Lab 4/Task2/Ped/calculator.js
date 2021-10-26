function symbol(sym)
{
    document.getElementById("output").value += sym
}

function sqrt() {
    let sym = document.getElementById("output").value;
    document.getElementById("output").value = "√(" + sym + ")";
}

function result()
{
    let Result = document.getElementById("output").value.replace("√", "Math.sqrt")
    discharge(eval(Result))
}

function discharge(sym)
{
    document.getElementById("output").value = sym
}