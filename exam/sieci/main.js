const productList = document.querySelectorAll('.product');
const quantityList = document.querySelectorAll('.quantity');
const updateListButton = document.querySelectorAll('.update');
const orderListButton = document.querySelectorAll('.order');


function check() {
    quantityList.forEach((quantityCell) =>{
        let quantity = parseInt(quantityCell.innerHTML);
        if (quantity == 0) {
            quantityCell.style.background='red';
        }
        else if(quantity <= 5){
            quantityCell.style.background='yellow';
        }
        else{
            quantityCell.style.background='honeydew';
        }
    })
}
orderListButton.forEach((orderButton, i) => {
    orderButton.addEventListener('click', () => {
        
    })
})

updateListButton.forEach((updateButton, i) => {
    updateButton.addEventListener('click', () => {
        let quantity = prompt('Podaj nową ilość: ');
        quantityList[i].innerHTML = `${quantity}`;
        check();
    })
});

check();