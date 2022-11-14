function countPrice(){
    const quantity= document.getElementById('quantity')
    const result= document.getElementById('result')
    const gold= document.getElementById('gold')
    const silver= document.getElementById('silver')
    let price=parseInt(quantity.value)*50
    if(gold.checked){
        price=price*0.9
    }
    if(silver.cheked){
        price=price*0.95
    }    
    if(parseInt(quantity.value)<=0){
        quantity.classList.add('error')
        result.innerHTML='podaj dane:'
    }
    else{
        quantity.classList.remove('error')
        result.innerHTML=`wartość zamówienia wynosi: ${price}zł`
    }

    

}
