let result=document.getElementById("result");

function setSize(){
    let size = document.getElementById("size").value;
    result.style.fontSize = size+"%";
}

function setStyle(){
    let style = document.getElementById('style').value;
    result.style.fontStyle = style;
}

function formatRed(){
    result.style.color="red";
    setSize();
    setStyle();
}

function formatGreen(){
    result.style.color="green";
    setSize();
    setStyle();
}

function formatBlue(){
    result.style.color="blue";
    setSize();
    setStyle();
}
