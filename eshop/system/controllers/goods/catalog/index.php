<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

/*
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/DBconnect.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/UnitActions.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Unit.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Good.php');
*/

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

// $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// mysqli_set_charset($link, 'utf8');

$result = (new \Nordic\Core\Good())->getElements();
$rows = mysqli_num_rows($result);
// var_dump($result);
// echo $rows;
?>

<? while($row = mysqli_fetch_assoc($result)){ ?>
    <? $good = new \Nordic\Core\Good($row['id']); ?>
    <? if ($rows > 2) { ?>
        <div class="catalog-item">
    <? } else { ?>
        <div class="item-margin">
    <? } ?>
            <a href="card.php?id=<?=$good->getField('id')?>">
                <? if ($good->photo() == 'img/catalog/10.jpg' || $good->photo() == 'img/catalog/12.jpg') { ?>
                    <div class="item-photo-cover" style="background-image: url('<?= $good->photo() ?>')"></div>
                <? } else { ?>
                    <div class="item-photo" style="background-image: url('<?= $good->photo() ?>')"></div>
                <? } ?>
            </a>
            <div class="title-goods">
                <a href="card.php?id=<?=$good->getField('id')?>" class="catalog-text letter-spacing">
                    <?= $good->title() ?>
                </a>
            </div>
            <div class="catalog-text letter-spacing">
                <?= $good->price() ?> руб.
            </div>
            <!-- <div> -->
                <!-- <?= \Nordic\Core\Good::getQuality() ?>  Это вызов статического метода -->
            <!-- </div>
            <div>
                <? if (\Nordic\Core\Good::HAS_GOOD) {?>
                    Товар в наличии!
                <? } ?>
            </div>
            <div>
                <? if (\Nordic\Core\Good::$has_good) {?>
                    Товар в наличии <?=\Nordic\Core\Good::$has_good ?>
                <? } ?>
            </div> -->
        </div>
<?}?>

