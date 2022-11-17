function zmien(nazwaPliku){
    let galeria = document.getElementById('galeria');
    galeria.src = nazwaPliku;
}

let on = false;

function zamiana(){
    let ikona = document.getElementById('ikona');
    if(on){
        ikona.src = 'icon-on.png';
        on = false;
    }
    else{
        ikona.src = 'icon-off.png';
        on = true;
    }
}