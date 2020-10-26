<?php

// var_dump($_POST);

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php'); 

//получение данных
$login = $_POST['login'];
$email = $_POST['email'];

// Подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];

// Разбираем все пришедшие данные
foreach ($_POST as $key => $value) {
    if ($key == 'password') {
        $arr_values[] = "'".crypt($value)."'";
    } else {
        $arr_values[] = "'".$value."'";
    }
    $arr_fields[] = $key;
}

// Преобразовали массивы к строкам, чтобы подставить в запрос
$str_fields = implode(',',$arr_fields);
$str_values = implode(',',$arr_values);

// подключаеся к базе данных и записываем
$connect = new \Nordic\Core\DBconnect();

$result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM core_users WHERE login='$login' OR email='$email'");
$info = mysqli_fetch_assoc($result);
$amount = $info['num'];

if ($amount > 0) {
    echo "Клиент с таким логин или E-mail уже существует";
} else {
    // echo "INSERT INTO core_user($str_fields) VALUES($str_values) ";
    // создаём новую строчку в таблице
    $result_create = mysqli_query($connect->getConnection(),"INSERT INTO core_users($str_fields) VALUES($str_values) ");

    if ($result) {
        header('Location: http://localhost/eshop/admin/?page=users');
        // echo 'Новый клиент создан';
    } else {
        echo 'Что-то пошло не так';
    }
}