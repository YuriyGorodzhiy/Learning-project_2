<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

$test = new \Nordic\Test\Test();
$test->drive();

echo '<br>';

$good_from_library = new \Library\Good();
$good_from_library->showInfo();

echo '<br>';

$good_shop = new \Nordic\Core\Good(1); //передаём id = 1 и пытвкмся вызвать цену 'price'
echo $good_shop->price();