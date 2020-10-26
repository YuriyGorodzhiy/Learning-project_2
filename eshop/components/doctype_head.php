<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php 
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('.', $url);
        $url = $url[0];
        ?>
        <? if ($url == '/eshop/index') { ?>
            <title>Магазин одежды и обуви</title>
        <? } ?>
        <? if ($url == '/eshop/catalog') { ?>
            <title>Каталог одежды и обуви</title>
        <? } ?>
        <? if ($url == '/eshop/card') { ?>
            <title>Карточка товара</title>
        <? } ?>
        <? if ($url == '/eshop/basket') { ?>
            <title>Корзина товаров</title>
        <? } ?>
        <? if ($url == '/eshop/auth/index') { ?>
            <title>Авторизация пользователя</title>
            <link rel="stylesheet" href="../css/style.css">
        <? } elseif ($url == '/eshop/auth/reg/index') { ?>
            <title>Регистрация пользователя</title>
            <link rel="stylesheet" href="../../css/style.css">
        <? } else { ?>
            <link rel="stylesheet" href="css/style.css">
        <? } ?>

    </head>
    <body class="wrapper">