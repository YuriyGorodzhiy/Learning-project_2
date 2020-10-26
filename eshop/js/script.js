
// Асинхронный вод товаров на страницу каталого (т.е. после загрузки страницы)
function renderGoods(){

    // создаём новый экземпляр класса для задания асинхронного запроса
    let xhr = new XMLHttpRequest();

    // Формирование "url-а" для вывода каталога по запросу "Женщинам", "Мужчинам" или "Детям"
    let url = 'http://localhost/eshop/system/controllers/goods/catalog/index.php';
    let str_get = window.location.search; // получаем "?category_id=3" из адресной страки страницы
    url = url + str_get;

    //запустили метод open() для установки запроса на сервер по определённым параметрам
    xhr.open('GET',url,true); 
    //метод установления заголовков запроса c необходимыми характеристиками (это строчка нужна только, чтобы отправлять POST запросы)
    xhr.setRequestHeader('Content-type','application/x-form-urlencode'); 
    // как только ответ на запрос вернётся от сервера
    xhr.onreadystatechange = function(){
        // и они будут "хорошие" (состояние готовности=4(значит запрос выполнен) и статус=200(значит без ошибок статус))
        if(xhr.readyState == 4 && xhr.status == 200){
            // делаем то, что нам надо с ответом
            document.getElementById('catalog').innerHTML = xhr.responseText;
        }
    }

    xhr.send(null);
}

document.getElementById('catalog').innerHTML = '<img src="img/preloader.gif" style="margin: 50px auto; width: 200px">';
setTimeout(function(){
    renderGoods(); // запускем функцию renderGoods()
},1000);


function toBasket(){

    // создаём новый экземпляр класса для задания асинхронного запроса
    let xhr = new XMLHttpRequest();

    // Формирование "url-а" для вывода каталога по запросу "Женщинам", "Мужчинам" или "Детям"
    let url = 'http://localhost/eshop/system/controllers/basket/to_basket.php';
    let str_get = window.location.search; // получаем "?category_id=3" из адресной страки страницы
    url = url + str_get;

    //запустили метод open() для установки запроса на сервер по определённым параметрам
    xhr.open('GET',url,true); 
    
    // как только ответ на запрос вернётся от сервера
    xhr.onreadystatechange = function(){
        // и они будут "хорошие" (состояние готовности=4 (значит запрос выполнен) и статус=200(значит без ошибок статус))
        if(xhr.readyState == 4 && xhr.status == 200){
            // делаем то, что нам надо с ответом
            // alert('товар в корзине');
            document.getElementById('basket-count').innerHTML = xhr.responseText;
        }
    }

    xhr.send(null);
}


function fromBasket(){

    // получаем id товара
    let id = event.target.getAttribute('data-id');

    // скрываем товар визуально
    event.target.closest('.remove-goods').remove();    

    // создаём новый экземпляр класса для задания асинхронного запроса
    let xhr = new XMLHttpRequest();

    // Формирование "url-а" для вывода страницы "Корзина" пустой
    let url = 'http://localhost/eshop/system/controllers/basket/from_basket.php';
    let str_get = '?id='+id; // получаем "?category_id=3" из адресной страки страницы
    url = url + str_get;

    //запустили метод open() для установки запроса на сервер по определённым параметрам
    xhr.open('GET',url,true); 
    
    // как только ответ на запрос вернётся от сервера
    xhr.onreadystatechange = function(){
        // и они будут "хорошие" (состояние готовности=4(значит запрос выполнен) и статус=200(значит без ошибок статус))
        if(xhr.readyState == 4 && xhr.status == 200){
            // делаем то, что нам надо с ответом
            // alert('товар удалён из корзины');
            document.getElementById('basket-count').innerHTML = xhr.responseText;
        }
    }
    xhr.send(null);

    function renderBasket(){
        // создаём новый экземпляр класса для задания асинхронного запроса
        let xhr = new XMLHttpRequest();
    
        //запустили метод open() для установки запроса на сервер по определённым параметрам
        xhr.open('GET','http://localhost/eshop/system/controllers/basket/index.php',true); 
        //метод установления заголовков запроса c необходимыми характеристиками (это строчка нужна только, чтобы отправлять POST запросы)
        xhr.setRequestHeader('Content-type','application/x-form-urlencode'); 
        // как только ответ на запрос вернётся от сервера
        xhr.onreadystatechange = function(){
            // и они будут "хорошие" (состояние готовности=4(значит запрос выполнен) и статус=200(значит без ошибок статус))
            if(xhr.readyState == 4 && xhr.status == 200){
                // делаем то, что нам надо с ответом
                document.getElementById('basket').innerHTML = xhr.responseText;
            }
        }    
        xhr.send(null);
    }
    renderBasket();    
}