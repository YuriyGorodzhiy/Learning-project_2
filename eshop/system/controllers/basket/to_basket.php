<?php

session_start();

// считываем содержимое корзины в буфер (переменную)
if (isset($_SESSION['basket'])) {
    $basket = $_SESSION['basket']; // Если в массиве что-то уже было, то присваиваем содержимое переменной $basket
} else {
    $basket = []; // Если массива не существует, создаём пустой массив $basket
}

// получаем id товара
if ($id = $_GET['id']) {
    // если в корзине нет товара (id) в массиве $basket, то добавляем
    if (!in_array($id,$basket)) {
        $basket[] = $id;
    }

    $_SESSION['basket'] = $basket;

    // var_dump($_SESSION['basket']);

    // выводим количество товара на экран
    echo count($_SESSION['basket']);

    // Зачистка корзины
    // $_SESSION['basket'] = null;
}

