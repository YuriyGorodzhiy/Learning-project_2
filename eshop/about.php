<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>O нас</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" href="css/style.css">

        <script src="https://api-maps.yandex.ru/2.1/?apikey=c15cd479-89d0-4f13-bfad-5b93b2506f19&lang=ru_RU" type="text/javascript">
        </script>

        <script type="text/javascript">
            ymaps.ready(init);

            function init(){
                var myMap = new ymaps.Map("map", {
                    center: [57.76, 33.64],
                    zoom: 6  
                });

                let points = JSON.parse(getShops()); // Из строки JSONа создаём массив
                for (let i = 0; i < points.length; i++) {
                    // Создание метки 
                    let myPlacemark = new ymaps.Placemark(
                        [points[i].latitude, points[i].longitude],
                        {
                            hintContent: points[i].title,  
                            balloonContent: '<b>'+points[i].title+'</b><div>'+points[i].address+'</div><div>'+points[i].description+'</div><div><img src="'+points[i].photo+'"/></div>'
                        }
                    );
                    // Добавление метки на карту
                    myMap.geoObjects.add(myPlacemark);
                }
            }

            function getShops() {
                //создаем новый экземпляр класса для запросов
                let xhr = new XMLHttpRequest();

                let url = 'http://localhost/eshop/api/1.0/shops/get/all/index.php';
               
                //запустили метод open() для установки параметров запроса
                xhr.open('GET',url,false);
                xhr.send();
                return xhr.responseText;
            }
        </script>
    </head>

    <body class="wrapper">

        <?php

            include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
            include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

            $connect = new \Nordic\Core\DBconnect();

            // Подключение блока header
            require_once('components/header/index.php');

        ?>

        <div class="map-title">
            <h1 class="catalog-title basket-title-weight">Наши магазины на карте</h1>
        </div>
        <div id="map"></div>

            <!-- подключаем footer -->
        <? require_once('components/footer/index.php'); ?>

    </body>
</html>