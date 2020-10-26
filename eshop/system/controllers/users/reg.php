<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');


//получение данных
$login = $_GET['login'];
$email = $_GET['email'];
$password = crypt($_GET['password']);
// $password = $_GET['password'];

// подключаеся к базе данных и записываем
$connect = new \Nordic\Core\DBconnect();

$result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM core_users WHERE login='$login' OR email='$email'");
$info = mysqli_fetch_assoc($result);
$amount = $info['num'];

if ($amount > 0) {
    echo "Такой логин или E-mail уже существуют";
} else {
    // создаём новую строчку в таблице
    mysqli_query($connect->getConnection(),"INSERT INTO core_users(login,email,password) VALUES('$login','$email','$password')");
    echo "Вы успешно зарегистрировались";
}

