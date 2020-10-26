<?php

// var_dump($_POST);

// var_dump($_FILES);

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php'); 

// Подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];

// Разбираем все пришедшие данные
foreach ($_POST as $key => $value) {
    $arr_fields[] = $key;
    $arr_values[] = "'".$value."'";
}

$file_name_info = explode('.', $_FILES['photo']['name']);

// чистое название файла
$file_pure_name = $file_name_info[0];
// расширение файла
$file_ext = $file_name_info[1];
// уникальная сгенерированная строка
$hash = md5($file_pure_name . time());

// новое уникальное имя файла
$file_new_name = $file_pure_name .'_'. $hash . '.' .$file_ext;


$file_full_path = 'img/catalog/'.$file_new_name;

// загрузка файла на сервер
move_uploaded_file($_FILES['photo']['tmp_name'], '../../../'.$file_full_path);

$arr_fields[] = 'photo';
$arr_values[] = "'".$file_full_path."'";

// Преобразовали массивы к строкам, чтобы подставить в запрос
$str_fields = implode(',',$arr_fields);
$str_values = implode(',',$arr_values);

// подключаеся к базе данных и записываем
$connect = new \Nordic\Core\DBconnect();

// echo "INSERT INTO core_goods($str_fields) VALUES($str_values) ";

$result = mysqli_query($connect->getConnection(),"INSERT INTO core_goods($str_fields) VALUES($str_values) ");
if ($result) {
    header('Location: http://localhost/eshop/admin/?page=items');
// echo 'Товар создан';
} else {
    echo 'Что-то пошло не так';
}

