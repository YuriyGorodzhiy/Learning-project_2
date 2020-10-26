<? session_start();?>
<header> 
    <div class="flex-center">
        <a href="/eshop/index.php">
            <div class="eshop-logo"></div>
        </a>
        <nav class="flex-center">
            <div>
                <a href="/eshop/catalog.php?category_id=1" class="<?if(isset($_GET['category_id']) && $_GET['category_id'] == 1 ){?> is-bold <?}?> catalog-text margin_nav">Женщинам</a>
            </div>
            <div>
                <a href="/eshop/catalog.php?category_id=2" class="<?if(isset($_GET['category_id']) && $_GET['category_id'] == 2 ){?> is-bold <?}?> catalog-text margin_nav">Мужчинам</a>
            </div>
            <div>
                <a href="/eshop/catalog.php?category_id=3" class="<?if(isset($_GET['category_id']) && $_GET['category_id'] == 3 ){?> is-bold <?}?> catalog-text margin_nav">Детям</a>
            </div>
            <div>
                <a href="/eshop/catalog.php?is_new=1" class="<?if(isset($_GET['is_new'])){?> is-bold <?}?> catalog-text margin_nav">Новинки</a>
            </div>
            <div>
                <a href="/eshop/about.php" class="catalog-text">О нас</a>
            </div>
        </nav>
    </div>
    <div class="shopper">
        <div class="shopper-block account">
            <div class="shopper-item account-logo"></div>
            <? if (isset($_COOKIE['user_id'])) {?>
                <div class="catalog-text">Привет,&#160;
                    <?= (new \Nordic\Core\User($_COOKIE['user_id']))->getField('login')?>
                </div>
                &#160;
                (<a href="system/controllers/users/logout.php" class="catalog-text" style="color: rgb(238, 140, 75);">
                    выйти
                </a>)
            <? } else {?>
                <a href="/eshop/auth/index.php" class="catalog-text">
                    Войти
                </a>
            <? } ?>
        </div>
        <div class="shopper-block">
            <div class="shopper-item basket-logo"></div>
            <a href="/eshop/basket.php" class="catalog-text margin_zero">
                Корзина (<span id="basket-count"><?php 
                if (isset($_SESSION['basket'])) {
                    echo count($_SESSION['basket']);
                } else {
                echo 0;
                }?></span>)
            </a>
        </div>
    </div>
</header>