function check(){
    let lastName = document.getElementById('lastName');
    let email = document.getElementById('email');
    let age = document.getElementById('age');
    let errorName = document.getElementById('errorName');
    let errorEmail = document.getElementById('errorEmail');
    let errorAge = document.getElementById('errorAge');
    let result = document.getElementById('result')

    if(lastName.value.length<3){
        lastName.classList.add('error');
        errorName.innerHTML='za krótkie nazwisko';
    }
    else{
        lastName.classList.remove('error');
        errorName.innerHTML='';
    }

    if(email.value.indexOf('@')<0 || email.value.length<6){
        email.classList.add('error');
        errorEmail.innerHTML='błędny adres';
    }
    else{
        email.classList.remove('error');
        errorEmail.innerHTML='';
    }
    if(age.value>=13 && age.value<=110)
    {
        age.classList.remove('error');
        errorAge.innerHTML='';
    }
    else if(age.value<13)
    {
        age.classList.add('error');
        errorAge.innerHTML='wiek jest za mały';
    }
    else
    {
        age.classList.add('error');
        errorAge.innerHTML='wiek jest zbyt duży';
    }

    if (lastName.value.length>=3 && 
        email.value.indexOf('@')>0 && email.value.length>=6
        && age.value>=13 && age.value<=110) {
            // dobrze
        
        result.innerHTML=`Nazwisko: ${lastName.value} <br> Email: ${email.value} <br> Wiek: ${age.value}`;

    }
}