<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

$connect = new \Nordic\Core\DBconnect();
$price = 0;
// Подключение блока с head и title
include('components/doctype_head.php');

// Подключение блока header
require_once('components/header/index.php');

?>

    <main id="basket">
        <div class="remove-goods">
            <? if (isset($_SESSION['basket']) && count($_SESSION['basket'])) {?>
                <div class="basket-title">
                    <h1 class="catalog-title basket-title-weight">ваша корзина</h1>
                    <p class="catalog-subtitle">Товары резервируются на ограниченное время</p>
                </div>
                <div class="flex-box flex-beetween basket-table-title">
                    <div class="column-photo">фото</div>
                    <div class="column-name">наименование</div>
                    <div class="column-size">размер</div>
                    <div class="column-quantity">количество</div>
                    <div class="column-cost">стоимость</div>
                    <div class="column-remove">удалить</div>
                </div>
                <? foreach($_SESSION['basket'] as $id) { ?>
                    <? $good = new \Nordic\Core\Good($id); ?>
                    <div class="basket-table-row flex-align">
                        <a href="card.php?id=<?=$good->getField('id')?>" class="column-photo">
                            <div class="field-photo" style="background-image: url('<?= $good->photo() ?>')"></div>
                        </a>
                        <div class="column-name">
                            <div class="">
                                <a href="card.php?id=<?=$good->getField('id')?>" class="basket-good-title">
                                    <?= $good->title() ?>
                                </a>
                                <div class="basket-good-article">
                                    арт. <?= $good->getField('articul') ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="column-size basket-good-text">
                            39
                        </div>
                        <div class="column-quantity basket-good-text">1</div>
                        <div class="column-cost catalog-text">
                            <?= $good->price() ?> руб.
                            <?php $price += $good->price() ?>
                        </div>
                        <div class="column-remove">
                            <div data-id="<?= $id?>" onclick="fromBasket()" class="close"></div>
                        </div>
                    </div>
                <?}?>
                <div class="flex-right box-price-total">
                    <div class="catalog-text">Итого:</div>
                    <div class="price-total"><?php echo ($price) ?> руб.</div>
                </div>
                <div class="card-button flex-center basket-button">
                    <a href="system/controllers/basket/clear_basket.php" class="basket-button-text">очистить корзину</a>
                </div>
                <div class="shape-box">
                    <img src="icons_eshop/shape.png" alt="">
                </div>
                <form action="system\controllers\orders\create.php" method="GET">
                    <div class="form-delivery flex-justify">
                        <div>
                            <div class="form-title form-title-margin center">адрес доставки</div>
                            <div class="form-text form-subtitle-margin center">Все поля обязательны для заполнения</div>
                            <div id="delivery" class="from-delivery-item position">
                                <div class="from-delivery-item-title">выберите вариант доставки</div>
                                <div class="delivery-pay form-delivery-box">
                                    <div class="from-delivery-box-text">Курьерская служба - 500 руб.</div>
                                    <div class="triangle-delivery"></div>
                                </div>
                                <ul class="list-delivery">
                                    <li class="from-delivery-box-text">
                                        Транспортная компания от 799 руб.
                                    </li>
                                    <li class="from-delivery-box-text">
                                        Почтовое отправление от 299 руб.
                                    </li>
                                    <li class="from-delivery-box-text">
                                        Служба экспресс доставки от 500 руб.
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-box from-delivery-item">
                                <div class="margin-half-box">
                                    <div class="from-delivery-item-title">имя</div>
                                    <input class="form-delivery-half-box" type="text" name="first_name" required>
                                </div>
                                <div>
                                    <div class="from-delivery-item-title">фамилия</div>
                                    <input class="form-delivery-half-box" type="text" name="surname">
                                </div>
                            </div>
                            <div class="from-delivery-item">
                                <div class="from-delivery-item-title">адрес</div>
                                <input class="form-delivery-box" type="text" name="address">
                            </div>
                            <div class="flex-box from-delivery-item">
                                <div class="margin-half-box">
                                    <div class="from-delivery-item-title">город</div>
                                    <input class="form-delivery-half-box" type="text" name="city">
                                </div>
                                <div>
                                    <div class="from-delivery-item-title">индекс</div>
                                    <input class="form-delivery-half-box" type="number" name="postcode">
                                </div>
                            </div>
                            <div class="flex-box from-delivery-item">
                                <div class="margin-half-box">
                                    <div class="from-delivery-item-title">телефон</div>
                                    <input class="form-delivery-half-box" type="tel" name="phone" required>
                                </div>
                                <div>
                                    <div class="from-delivery-item-title">e-mail</div>
                                    <input class="form-delivery-half-box" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shape-box">
                        <img src="icons_eshop/shape.png" alt="">
                    </div>
                    <div class="form-pay flex-justify">
                        <div>
                            <div class="form-title form-title-margin center">варианты оплаты</div>
                            <div class="form-text form-subtitle-margin center">Все поля обязательны для заполнения</div>
                            <div class="flex-justify total-pay-margin">
                                <div class="total-pay-left">
                                    <div>Стоимость:</div>
                                    <div>Доставка:</div>
                                    <div class="total-pay-color">Итого:</div>
                                </div>
                                <div class="total-pay-right">
                                    <div><?php echo ($price) ?> руб.</div>
                                    <div>500 руб.</div>
                                    <div class="total-pay-color"><?php echo ($price + 500) ?> руб.</div>
                                </div>
                            </div>
                            <div class="from-pay-item position">
                                <div class="from-delivery-item-title">выберите способ оплаты</div>
                                <div class="delivery-pay form-delivery-box">
                                    <div class="from-delivery-box-text">Банковская карта</div>
                                    <div class="card-logo flex-center">
                                        <div class="pay-card"></div>
                                        <div class="triangle-delivery"></div>
                                    </div>
                                </div>
                                <ul class="list-delivery">
                                    <li class="from-delivery-box-text">
                                        Яндекс-кошелёк
                                    </li>
                                    <li class="from-delivery-box-text">
                                        Оплата наложным платежом на почте
                                    </li>
                                    <li class="from-delivery-box-text">
                                        Оплата курьеру при получении
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-justify">
                                <button class="card-button order-button">заказать</button>
                            </div>
                        </div>
                    </div>
                </form>
            <? } else {?>
                <div class="basket-title">
                    <h1 class="catalog-title basket-title-weight">ваша корзина пуста</h1>
                </div>
            <? } ?>
        </div>    
    </main>

    <!-- подключаем footer -->
    <? require_once('components/footer/index.php'); ?>

</body>

<script src="js/script.js"></script>
<script src="js/list_script.js"></script>

