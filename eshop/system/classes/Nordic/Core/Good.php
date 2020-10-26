<?php

namespace Nordic\Core;

class Good extends \Nordic\Core\Unit
{   

    public static $has_good = 3;

    const HAS_GOOD = 1;
    const IS_REAL = 1;

    public static function getGoodStaticInfo()
    {
        return self::IS_REAL;
    }

    public static function getStaticVar()
    {
        return self::$has_good;
    }

    public static function getQuality()
    {
        if (static::getGoodStaticInfo()) {
            $text = "Этот товар официальный"; // Если IS_REAL = 1 это значит TRUE (истина)
        } else {
            $text = "Этот товар подделка"; // Если IS_REAL = 0 это значит FALSE (ложь)
        }
        echo $text;
    } 

    // переопределение метода (полиморфизм)
    public function setTable()
    {
        return 'core_goods';
    }
    
    public function price()
    {
        // return $this->price;
        return $this->getfield('price');
    }

    public function photo()
    {
        // return $this->photo;
        return $this->getfield('photo');
    }

    public function getElements() 
    {
        $connect = new \Nordic\Core\DBconnect();
        $filter = '';
        //фильтрация по категориям(разделам)
        if (isset($_GET['category_id']) && $category_id = $_GET['category_id']) {
            $filter .= " AND category_id=$category_id "; //Конкатена́ция — операция склеивания объектов линейной структуры, обычно строк.
        }
        // echo $_GET['category_id']; //проверяем, виден ли суперглобальный массив
        // var_dump($_GET); // Выведем весь массив
        // echo "SELECT * FROM ".$this->setTable(). " $filter ";
        
        //фильтрация по типу товара
        if (isset($_GET['type']) && $type_id = $_GET['type']) {
            $filter .= " AND type_id=$type_id "; //Конкатена́ция — операция склеивания объектов линейной структуры, обычно строк.
        }

        //фильтрация по новинкам
        if (isset($_GET['is_new']) && $is_new = $_GET['is_new']) {
            $filter .= " AND is_new=$is_new "; //Конкатена́ция — операция склеивания объектов линейной структуры, обычно строк.
        }

        //Расчёт товаров на страницу
        $page = 1; // Задаём значение по умолчанию, чтобы не было "пустоты" при обращении к БД
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }

        if (isset($_GET['category_id']) || isset($_GET['type']) || isset($_GET['is_new'])) {
            $limit = 2;
            $limit1 = 12;
            //если страница 1 - стартовое значение 0
            //если страница 2 - старт 2
            //если страница 3 -старт 4
            //нужно подобрать формулу для стартового значения
            $from = ($page - 1)*$limit;
            $from1 = ($page - 1)*$limit1;
    
            $result = mysqli_query($connect->getConnection(), "SELECT * FROM ".$this->setTable(). " WHERE id>0 $filter LIMIT $from, $limit "); //LIMIT 2,2 выбираем из БД после 2-го два товара (т.е. 3 и 4). Это для того чтобы разбить товары по страницам
            // echo "SELECT * FROM ".$this->setTable(). " WHERE id>0 $filter LIMIT $from, $limit "; - проверка запроса в БД
            return $result;
        } else {
            $limit = 12;
            $from = ($page - 1)*$limit;
            $result = mysqli_query($connect->getConnection(), "SELECT * FROM ".$this->setTable(). " WHERE id>0 $filter LIMIT $from, $limit "); 
            return $result;
        }

    }

}