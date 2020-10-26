<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

$result = (new \Nordic\Core\Article())->getElements();
$connect = new \Nordic\Core\DBconnect();

// Подключение блока с head и title
include('components/doctype_head.php');

// Подключение блока header
require_once('components/header/index.php');

?>
    <main >
        <div class="center">
            <h1 class="main-title">
                новые поступления весны
            </h1>
            <p class="main-text">
                Мы подготовили для Вас лучшие новинки сезона
            </p>
            <a href="catalog.php?is_new=1" class="main-button catalog-text">посмотреть новинки</a>
        </div>
        <div class="flex-box flex-column">
            <? while($row = mysqli_fetch_assoc($result)) { ?> <!-- короткая запись -->
                <? $article = new \Nordic\Core\Article($row['id']); ?>
                <? if ($row['id'] == 1 || $row['id'] == 10) { ?>
                    <div class="article column-height" style="background-image: url('<?= $article->getField('photo') ?>')">
                        <div>
                            <div class="article-title">
                                <?= $article->title() ?>
                            </div>
                            <div class="article-description-1">
                                <?= $article->getField('description') ?>
                            </div>
                <? } ?>
                <? if ($row['id'] == 5 || $row['id'] == 9) { ?>
                    <div class="article article-color" style="background-image: url('<?= $article->getField('photo') ?>')">
                        <div>
                            <div class="arrow"></div>
                            <div class="article-title">
                                <?= $article->title() ?>
                            </div>
                <? } ?>
                <? if ($row['id'] ==3 || $row['id'] == 7 ) { ?>
                    <div class="article" style="background-image: url('<?= $article->getField('photo') ?>')">  
                        <div>
                            <div class="flex-center">
                                <div class="stick"></div>
                                <div class="attention-sign"></div>
                                <div class="stick"></div>
                            </div>
                            <div class="article-description-2">
                                    <?= $article->getField('description') ?>
                            </div>           
                <? } ?>
                <? if ($row['id'] ==2 || $row['id'] == 4 || $row['id'] == 6 || $row['id'] == 8) { ?>
                    <div class="article" style="background-image: url('<?= $article->getField('photo') ?>')">  
                        <div>
                            <div class="article-title">
                                <?= $article->title() ?>
                            </div>
                            <div class="article-description-3">
                                <?= $article->getField('description') ?>
                            </div>
                <? } ?>
                        </div>
                    </div>
            <?}?>
        </div>
        <div class="center">
            <p class="form-title">
                будь всегда в курсе выгодных предложений 
            </p>
            <p class="form-text">
                подписывайся и следи за новинками и выгодными предложений
            </p>
            <form class="flex-center" method="POST" action="form.php" autocomplete="off">
                <div class="form-item">
                    <input type="email" name="email" placeholder="e-mail" required> 
                </div>
                <div class="form-item">
                    <input type="submit" value="записаться">
                </div>
            </form>
            <p class="form-text-red">
                Некорректный e-mail. Попробуйте ещё раз.
            </p>  
        </div>       
    </main>

    <?php include('components/footer/index.php'); ?>

</body>
</html>