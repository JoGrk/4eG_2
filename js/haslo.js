function checkPassword(){
    let password = document.getElementById('haslo').value;
    let result = document.getElementById('result');

    if(password.length==0){
        result.innerHTML="Wpisz hasło";
        result.style.color='red';    
    }
    else if(password.length>=7 && isDigit(password)){
        alert ('hasło jest dobre');
    }
    else if(password.length>=4 && isDigit(password)){
        alert ('średnie');
    }
    else{
        alert ('słabe');
    }

}
function isDigit(password){
    let reg = /[0-9]/;
    return reg.test(password)
}