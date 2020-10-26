<?php

session_start();

// считываем содержимое корзины в буфер (переменную)
if (isset($_SESSION['basket'])) {
    $basket = $_SESSION['basket'];
} else {
    $basket = [];
}

// получаем id товара
if ($id = $_GET['id']) { //Если id в адресной строке есть, то дальше выполняется сценарий, чтобы не записалась пустота
    // нужно найти элемент ($id) с таким значением в массиве ($basket) и его удалить 
    if (in_array($id,$basket)){
        for ($i= 0; $i < count($basket); $i++) {
            // если нашли элемент, то удаляем и прекращаем цикл
            if ($basket[$i] == $id) {
                unset($basket[$i]);
                break;
            }
        }
        // сортируем массив после удаления элемента ($id) с таким значением из массива
        sort($basket);
    }

    $_SESSION['basket'] = $basket;

    echo count($_SESSION['basket']);
}