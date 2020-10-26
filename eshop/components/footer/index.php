
<footer>
    <div class="footer"">
        <div class="footer-item">
            <p class="footer-item-title">КОЛЛЕКЦИЯ</p>
            <?php
            $categories = mysqli_query($connect->getConnection(), "SELECT * FROM categories "); 
            while($category = mysqli_fetch_assoc($categories)){
                $count = mysqli_query($connect->getConnection(), "SELECT COUNT(*) as num FROM core_goods WHERE category_id=".$category['id']);
                $info = mysqli_fetch_assoc($count);
                ?>
                <!-- <div  class="margin-footer"> -->
                    <a href="/eshop/catalog.php?category_id=<?=$category['id']?>" class="catalog-text margin-footer">
                        <?=$category['title']?> (<?=$info['num']?>)
                    </a>
                <!-- </div> -->
            <?}?>
            <?php
            $count = mysqli_query($connect->getConnection(), "SELECT COUNT(*) as num FROM core_goods WHERE is_new=1");
            $info = mysqli_fetch_assoc($count);
            ?>
            <!-- <div class="margin-footer"> -->
                <a href="/eshop/catalog.php?is_new=1" class="catalog-text margin-footer">
                    Новинки (<?=$info['num']?>)
                </a>
            <!-- </div> -->
        </div>
        <div class="separation"></div>
        <div class="footer-item">
            <p class="footer-item-title">МАГАЗИН</p>
            <!-- <div> -->
                <a href="/eshop/map.php" class="catalog-text margin-footer">О нас</a>
            <!-- </div> -->
            <!-- <div> -->
                <a href="/eshop/basket.php#delivery" class="catalog-text margin-footer">Доставка</a>
            <!-- </div> -->
            <!-- <div> -->
                <a href="#" class="catalog-text margin-footer">Работай с нами</a>
            <!-- </div> -->
            <!-- <div> -->
                <a href="#" class="catalog-text margin-footer">Контакты</a>
        </div>
        <div class="separation"></div>
        <div class="footer-item">
            <p class="footer-item-title">мы в социальных сетях</p>
            <div class="flex-box">
                <p class="catalog-text margin-footer">Сайт разработан&nbsp;</p>
                <a href="#" class="catalog-text margin-footer">inordic.ru</a>
            </div>
            <p class="catalog-text margin-footer">2018 &copy; Все права защищены</p>
            <div class="flex-box">
                <a class="social-icon twitter" href=""></a>
                <a class="social-icon facebook" href=""></a>     
                <a class="social-icon instagram" href=""></a>                  
           </div>
        </div>
    </div>
</footer>