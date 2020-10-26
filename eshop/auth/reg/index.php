<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

$result = (new \Nordic\Core\Article())->getElements();
$connect = new \Nordic\Core\DBconnect();

// Подключение блока с head и title
include('../../components/doctype_head.php');

// Подключение блока header
require_once('../../components/header/index.php');

?>
        <main>
            <h1 class="catalog-title ">регистрация пользователя</h1>
            <form class="form-reg" action="../../system/controllers/users/reg.php" method="get">
                <div class="form-reg-item">
                    <input type="text" name="login" placeholder="Логин" required>
                </div>
                <div class="form-reg-item">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="form-reg-item">
                    <input type="password" name="password" placeholder="Пароль" required>
                </div>
                <div class="form-reg-item">
                    <button>Зарегистрироваться</button>
                </div>
                <div class="form-reg-item">
                    <p class="catalog-text">или&nbsp;</p>
                    <a href="../index.php">&nbsp;войти</a>
                </div>
            </form>
        </main>

        <?php include('../../components/footer/index.php'); ?>

    </body>
</html>