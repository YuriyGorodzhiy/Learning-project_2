<?php

session_start();

// var_dump($_GET);
// var_dump($_SESSION['basket']);

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

$arr_fiels = [];
$arr_values = [];

foreach ($_GET as $key => $value) {
    $arr_fiels[] = $key;
    $arr_values[] = "'".$value."'";
}

// $first_name = $_GET['first_name'];
// $email = $_GET['email'];
// $phone = $_GET['phone'];
// $goods = json_encode($_SESSION['basket']);
// $publ_time = time();

$arr_fiels[] = 'goods';
$arr_values[] = "'".json_encode($_SESSION['basket'])."'";

$arr_fiels[] = 'publ_time';
$arr_values[] = time();

$str_fields = implode(',',$arr_fiels);
$str_values = implode(',',$arr_values);

// подключаеся к базе данных и записываем
$connect = new \Nordic\Core\DBconnect();

// echo "INSERT INTO core_orders($str_fields) VALUES($str_values) ";

$result = mysqli_query($connect->getConnection(),"INSERT INTO core_orders($str_fields) VALUES($str_values) ");
if ($result) {
    echo 'Ваш заказ успешно оформлен';
} else {
    echo 'Что-то пошло не так';
}

// Здесь место кода, который отправляет уведомления (телеграм бот)

// https://api.telegram.org/bot1219080728:AAEWgCWeGORfvaGt6WRpT-SkOK10aEv2PMc/getUpdates

$chat_id = 907042527;
$text = 'Вам пришёл заказ';
$photo = 'https://andy-blog.ru/wp-content/uploads/2016/04/178891861.jpg';
$latitude = 48.984344;
$longitude = 44.661993;

$telegram = new \Nordic\Core\Telegram();
$telegram -> sendMessage($chat_id, $text);
$telegram -> sendPhoto($chat_id, $photo);
$telegram -> sendLocation($chat_id, $latitude, $longitude);


// sendMessage($chat_id, $text);

// $text = 'Привет Мир!'; 
// sendMessage($chat_id, $text);

// $text = 'Как дела?'; 
// sendMessage($chat_id, $text);


// $text = 'Вам пришёл заказ';
//         <a href="http://localhost/eshop/admin/?page=orders">Посмотреть в личном кабинете</a>

// $url = "https://api.telegram.org/bot1219080728:AAEWgCWeGORfvaGt6WRpT-SkOK10aEv2PMc/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html";

// Обращаемся к адресу ($url)
// file_get_contents($url);

// function sendMessage($chat_id, $text){
//     file_get_contents("https://api.telegram.org/bot1219080728:AAEWgCWeGORfvaGt6WRpT-SkOK10aEv2PMc/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html");
// }

// function sendPhoto($chat_id, $photo){
//     file_get_contents("https://api.telegram.org/bot1219080728:AAEWgCWeGORfvaGt6WRpT-SkOK10aEv2PMc/sendPhoto?chat_id=$chat_id&photo=$photo");
// }

// $photo = 'https://andy-blog.ru/wp-content/uploads/2016/04/178891861.jpg';
// sendPhoto($chat_id, $photo);

// $url_photo = "https://api.telegram.org/bot1219080728:AAEWgCWeGORfvaGt6WRpT-SkOK10aEv2PMc/sendPhoto?chat_id=$chat_id&photo=$photo";

// file_get_contents($url_photo);