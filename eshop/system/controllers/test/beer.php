<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

echo \Nordic\Test\Beer::NAME;

echo '<br>';

echo \Nordic\Test\Ale::NAME;


echo '<br>--------------------<br>';


echo \Nordic\Test\Beer::getName();

echo '<br>';

echo \Nordic\Test\Ale::getName();


echo '<br>--------------------<br>';


echo \Nordic\Test\Beer::getStaticName();

echo '<br>';

echo \Nordic\Test\Ale::getStaticName();


//Статические свойства и методы принадлежат КЛАССАМ, не ОБЪЕКТАМ

//Статические свойства и методы вызываются в контексте от имени КЛАССА с помощью ::

//Констаты являются статическими переменными

//Создаём статические с помощью ключевого слова static 

//Обратится внутри класса к статике можно с помощью "static" и "self"

//static указывает на тот класс, от которого вызывается метод

//self указывает на тот класс, внутри которого создан метод