<?

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/config.php');

// Подключение блока с head и title
include('components/doctype_head.php');

// Подключение блока header
require_once('components/header/index.php');
    
    if (isset($_GET['category_id'])) {
        $category = new \Nordic\Core\Category($_GET['category_id']);
        $cat_name = $category->getField('title');
        $margin_title = '';
        $all_goods = '<p class="catalog-subtitle">Все товары</p>';
    } else {
        $cat_name = 'Все товары';
        $margin_title = 'margin_title';
        $all_goods = '';
    }
?>
    <main >
        <div class="breadcrumbs flex-box">
            <a href="index.php" class="breadcrumbs-item">главная</a>
            <p class="breadcrumbs-item slash">/</p>
            <p class="breadcrumbs-item"><?=$cat_name?></p>
        </div>
        <h1 class="catalog-title <?=$margin_title?>"><?=$cat_name?></h1>
        <?=$all_goods?>
        <div class="filters">
            <ul class="filters-list flex-center">
                <li>
                    <div class="filters-box">
                        <div class="filters-link">Категории</div>
                        <div class="triangle"></div>
                    </div>
                    <div class="filters-stick"></div>
                    <ul class="sub-filters-list">
                        <li>
                            <!-- // Используем "Тернарный оператор", который позволит вам чуточку сократить ваш код, и улучшить 
                            //обработку получаемых переменных, или улучшить возврат значений из функций. Вместо условия if -->
                            <a href="?type=1<?= isset($_GET['category_id']) ? '&category_id='.$_GET['category_id'] : '' ?>" class="sub-filters-link">Куртки</a>
                        </li>
                        <li>
                            <a href="?type=2<?= isset($_GET['category_id']) ? '&category_id='.$_GET['category_id'] : '' ?>" class="sub-filters-link">Джинсы</a>
                        </li>
                        <li>
                            <a href="?type=3<?= isset($_GET['category_id']) ? '&category_id='.$_GET['category_id'] : '' ?>" class="sub-filters-link">Обувь</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="filters-box">
                        <div class="filters-link">Размер</div>
                        <div class="triangle"></div>
                    </div>
                    <div class="filters-stick"></div>
                    <ul class="sub-filters-list">
                        <li>
                            <a href="" class="sub-filters-link">52-50</a>
                        </li>
                        <li>
                            <a href="" class="sub-filters-link">50-48</a>
                        </li>
                        <li>
                            <a href="" class="sub-filters-link">46-44</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="filters-box">
                        <div class="filters-link">Стоимость</div>
                        <div class="triangle"></div>
                    </div>
                    <div class="filters-stick"></div>
                    <ul class="sub-filters-list">
                        <li>
                            <a href="" class="sub-filters-link">0-1000 руб.</a>
                        </li>
                        <li>
                            <a href="" class="sub-filters-link">1000-3000 руб.</a>
                        </li>
                        <li>
                            <a href="" class="sub-filters-link">3000-6000 руб.</a>
                        </li>
                        <li>
                            <a href="" class="sub-filters-link">6000-20000 руб.</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Сюда подгружаем товары -->
        <div id="catalog" class="flex-justify"></div>
            <div class="pagination flex-center">
                <?php
                    // Пишем код для подсчёта колличества товара в БД
                    $connect = new \Nordic\Core\DBconnect();

                    //вспомогательная строчка для категории
                    $cat_str = '';

                    //вспомогательная строчка для типов
                    $type_str = '';

                    $new_str = '';

                    $filter = '';
                    //фильтрация по категориям(разделам)
                    if (isset($_GET['category_id']) && $category_id = $_GET['category_id']){
                        $filter .= " AND category_id=$category_id "; //Конкатена́ция — операция склеивания объектов линейной структуры, обычно строк.
                        $cat_str = "&category_id=$category_id"; // вместо одинарных ковычек ставим двойные, чтобы была видна переменная
                    }

                    //фильтрация по типу товара
                    if (isset($_GET['type']) && $type_id = $_GET['type']){
                        $filter .= " AND type_id=$type_id "; //Конкатена́ция — операция склеивания объектов линейной структуры, обычно строк.
                        $type_str = "&type=$type_id";
                    }

                    //фильтрация по новинкам
                    if (isset($_GET['is_new']) && $is_new = $_GET['is_new']){
                        $filter .= " AND is_new=$is_new "; //Конкатена́ция — операция склеивания объектов линейной структуры, обычно строк.  
                        $new_str = "&is_new=$is_new";
                    }

                    $result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM core_goods WHERE id>0 $filter"); //Посчитать количество товара функция COUNT(id) MySQL и записать кол-во в переменую num
                    //в РНР num будет "ключом", а в MySQL переменной
                    $info = mysqli_fetch_assoc($result); // приводим к ассоциативному массиву
                    $amount = $info['num']; //выводим дынные из массива с ключом num

                    if (isset($_GET['category_id']) || isset($_GET['type']) || isset($_GET['is_new'])) {
                        $per_page = 2;
                    } else {
                        $per_page = 12;
                    }
                    
                    $pages_amount = ceil($amount/$per_page); //фунуция ceil() округяет до целого в большую сторону

                    $page = 1;
                    if(isset($_GET['page'])){ //если есть значение "page"
                        $page = $_GET['page'];
                    }
                ?>
                <? for ($i =1; $i <= $pages_amount; $i++) { ?>
                <a href="?page=<?=$i?><?=$cat_str?><?=$type_str?><?=$new_str?>">
                    <div class="box flex-center <? if($i == $page) { ?> page-active <? } ?>">
                        <?=$i ?>
                    </div>
                </a>
                <? } ?>
            </div>
    </main>

    <!-- подключаем footer -->
    <? require_once('components/footer/index.php'); ?>
        
</body>
<script src="js/list_script.js"></script>
<script src="js/script.js"></script>
