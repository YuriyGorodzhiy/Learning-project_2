<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

$good = new \Nordic\Core\Good($_GET['id']);
$connect = new \Nordic\Core\DBconnect();

// Подключение блока с head и title
include('components/doctype_head.php');

// Подключение блока header
require_once('components/header/index.php');

?>

<? 
    $category = new \Nordic\Core\Category($good->getField('category_id'));
    $cat_name = $category->getField('title');

    $type = new \Nordic\Core\Type($good->getField('type_id'));
    $type_name = $type->getField('title');
?>
    <main>
        <div class="breadcrumbs flex-box">
            <a href="index.php" class="breadcrumbs-item">главная</a>
            <p class="breadcrumbs-item slash">/</p>
            <a href="catalog.php?category_id=<?=$good->getField('category_id')?>" class="breadcrumbs-item">
                <?=$cat_name?>
            </a>
            <p class="breadcrumbs-item slash">/</p>
            <a href="catalog.php?category_id=<?=$good->getField('category_id')?>&type=<?=$good->getField('type_id')?>" class="breadcrumbs-item">
                <?=$type_name?>
            </a>
            <p class="breadcrumbs-item slash">/</p>
            <p class="breadcrumbs-item"> <?= $good->title() ?></p>     <!-- либо можно написать вот так: <?=$good->getField('title')?>  -->            
        </div>
        <div class="card center">
            <div class="good-photo" style="background-image: url('<?= $good->photo() ?>')">
                <!-- <img src="<?= $good->photo() ?>">           -->
            </div>
            <div class="good-title">
                <?= $good->title() ?>
            </div>
            <div class="good-article">
                Артикул: <?= $good->getField('articul') ?>
            </div>
            <div class="good-price">
                <?= $good->price() ?> руб.
            </div>
            <div class="good-description">
                <?= $good->getField('description') ?>
            </div>
            <div class="good-size">
                размер
            </div>
            <div class="flex-center">
                <div class="box-size flex-center">38</div>
                <div class="box-size flex-center">39</div>
                <div class="box-size flex-center">40</div>
                <div class="box-size flex-center">41</div>
                <div class="box-size flex-center">42</div>
            </div>
            <div onclick="toBasket()" class="card-button flex-center">
               добавить в корзину
            </div>
        </div>
    </main>

    <!-- подключаем footer -->
    <? require_once('components/footer/index.php'); ?>
        
</body>

<script src="js/script.js"></script>