<?php

// var_dump($_POST);

// var_dump($_FILES);

$id = (int)$_POST['id'];

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php'); 
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php'); 

// Подготовили массивы полей и значений
$arr_fields = [];
$arr_values = [];

// Разбираем все пришедшие данные
foreach ($_POST as $key => $value) {
    if ($key != 'id') {
        $arr_fields[] = $key;
        $arr_values[] = "'".$value."'";
    }
}

$str_update = '';
for($i = 0; $i < count($arr_fields); $i++) {
    $str_update = $str_update . $arr_fields[$i] .'='.$arr_values[$i].',';
}
// обрезает с краёв строки запятые
$str_update = trim($str_update,','); 

// подключаеся к базе данных и записываем
$connect = new \Nordic\Core\DBconnect();

echo "UPDATE core_users SET $str_update WHERE id=$id ";

$result = mysqli_query($connect->getConnection(),"UPDATE core_users SET $str_update WHERE id=$id ");
if ($result) {
    header('Location: '.$_SERVER['HTTP_REFERER']);
    // echo 'Информация о клиенте изменена';
} else {
    echo 'Что-то пошло не так';
}

