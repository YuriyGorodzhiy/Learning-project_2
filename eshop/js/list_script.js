// Вариант с резким появлением и исчезновением списка (через display: none/block)
// let filter = document.querySelectorAll('.filters-box');
// let triangle = document.querySelectorAll('.triangle');
// let subFiltersList = document.querySelectorAll('.sub-filters-list');

// for (i = 0; i < filter.length; i++ ) {

//     let thisSubFilters = subFiltersList[i];
//     let thisTriangle = triangle[i];

//     filter[i].addEventListener('click', function() {
//         thisSubFilters.classList.toggle('open');
//         thisTriangle.classList.toggle('active');
//     });
// }

// Вариант с анимацией разворачивания и сворачивания списка (фильтрация товаров по типу)
let filter = document.querySelectorAll('.filters-box');
let triangle = document.querySelectorAll('.triangle');
let subFiltersList = document.querySelectorAll('.sub-filters-list');
for (i = 0; i < filter.length; i++ ) {

    let thisSubFilters = subFiltersList[i];
    let thisTriangle = triangle[i];
    
    filter[i].addEventListener('click', function() {

        // this.classList.toggle('open');
        thisTriangle.classList.toggle('active');

        if ( thisSubFilters.style.maxHeight) {
            thisSubFilters.style.maxHeight = null;
        } else {
            thisSubFilters.style.maxHeight = thisSubFilters.scrollHeight +'px'
        }
    })
}


// Вариант с анимацией разворачивания и сворачивания списка варианта доставки заказа
let delivery_pay = document.querySelectorAll('.delivery-pay');
let triangle_delivery = document.querySelectorAll('.triangle-delivery');
let listDelivery = document.querySelectorAll('.list-delivery');
for (i = 0; i < delivery_pay.length; i++ ) {

    let thislistDelivery = listDelivery[i];
    let thisTriangleDelivery = triangle_delivery[i];
    
    delivery_pay[i].addEventListener('click', function() {

        // this.classList.toggle('open');
        thisTriangleDelivery .classList.toggle('active');

        if ( thislistDelivery.style.maxHeight) {
            thislistDelivery.style.maxHeight = null;
        } else {
            thislistDelivery.style.maxHeight = thislistDelivery.scrollHeight +'px'
        }
    })
}