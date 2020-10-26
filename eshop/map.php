<!DOCTYPE html>
<html>
    <head>
        <title>O нас</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" href="css/style.css">

        <script>

            function initMap() {
                
                // The map, centered
                let map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 6,
                    center: {lat: 57.76, lng:33.64}
                });

                let points = JSON.parse(getShops()); // Из строки JSONа создаём массив
                for (let i = 0; i < points.length; i++) {
                    let lat = Number(points[i].latitude);
                    let lng = Number(points[i].longitude);

                    // Создание метки 
                    let marker = new google.maps.Marker({
                        position: {lat, lng},
                        map: map,
                        title: points[i].title
                    });

                    let infowindow = new google.maps.InfoWindow({
                        content: '<b>'+points[i].title+'</b><div>'+points[i].address+'</div><div>'+points[i].description+'</div><div><img src="'+points[i].photo+'"/></div>'
                    });

                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwbktBM3GY5GfsT0VfA1MGEobYqkvrSkc&amp;callback=initMap" async="" defer="">  </script>
</html>