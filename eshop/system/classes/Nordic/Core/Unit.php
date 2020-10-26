<?php

namespace Nordic\Core;

abstract class Unit implements \Nordic\Interfaces\UnitActions
{
    private $id;
    private $data;

    // вызывается автоматически при создании экземпляра класса (начинается с двойного подчёркивания)
    public function __construct($id = null){
        $this->id = $id;
    }

    public function __get($name){
        echo "Произошёл доступ к небупличным свойствам<br>";
        return $this->$name;
    }

    public function __set($name, $value){
        echo "Попытка изменить непубличное свойство";
        $this->$name = $value;
    }

// метод поиска id по title
// public function getElementByTitle($title){
//     $link = mysqli_connect('localhost', 'root', '', 'eshop');
//     mysqli_set_charset($link, 'utf8');
//     $result = mysqli_query($link, "SELECT id FROM ".$this->setTable()." WHERE title='$title'");
//     echo "SELECT id FROM ".$this->setTable()." WHERE title=".$title;
//     $row = mysqli_fetch_assoc($result);
//     // момент кэширования
//     $this->id = $row['id'];
//     mysqli_close($link);
// }

    // после того как мы написали метод __construct($id), метод getId($id) стал не нужен
    // public function getId($id){
    //     $this->id = $id;
    // }

    public function getTable($table){
        $this->table = $table;
    }

    public function setTable(){
        return $this->table;
    }

    public function getElements() {
        $connect = new \Nordic\Core\DBconnect();
        $result = mysqli_query($connect->getConnection(), "SELECT * FROM ".$this->setTable());
        return $result;
    }

    public function getData(){
        $link = mysqli_connect('localhost', 'root', '', 'eshop');
        mysqli_set_charset($link, 'utf8');
        $result = mysqli_query($link, "SELECT * FROM ".$this->setTable()." WHERE id=".$this->id);
        $row = mysqli_fetch_assoc($result);
        // момент кэширования
        $this->data = $row;
        mysqli_close($link);
    }
    
    public function getfield($field){
        if(!$this->data){
            $this->getData();
        }    
        return  ($this->data)[$field];

    }

    public function title(){
        // return $this->title;
        return $this->getfield('title');
    }

}