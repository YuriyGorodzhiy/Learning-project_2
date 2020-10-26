<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

$result = (new \Nordic\Core\Article())->getElements();
$connect = new \Nordic\Core\DBconnect();

// Подключение блока с head и title
include('../components/doctype_head.php');

// Подключение блока header
require_once('../components/header/index.php');

?>
        <main >
            <h1 class="catalog-title ">авторизация пользователя</h1>
            <form class="form-reg" action="../system/controllers/users/auth.php" method="get">
                <div class="form-reg-item">
                    <input required type="text" name="login" placeholder="Логин или E-mail">
                </div>
                <div class="form-reg-item">
                    <input required type="password" name="password" placeholder="Пароль">
                </div>
                <? if (isset($_GET['wrong'])) { ?>
                    <div class="form-reg-item catalog-text" style="color: rgb(237, 28, 36);">
                        Неверный логин или пароль
                    </div>
                <? } ?>
                <div class="form-reg-item">
                    <button>Войти</button>
                </div>
                <div class="form-reg-item">
                    <p class="catalog-text">или&nbsp;</p>
                    <a href="reg/index.php">зарегистрироваться</a>
                </div>
            </form>
        </main>

        <?php include('../components/footer/index.php'); ?>

    </body>
</html>