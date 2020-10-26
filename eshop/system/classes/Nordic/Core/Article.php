<?php

namespace Nordic\Core;

class Article extends \Nordic\Core\Unit implements \Nordic\Interfaces\ShowArticleInfo // наследование класса Unit и подключение интерфейса ShowArticleInfo
{
    // переопределение метода (полиморфизм)
    public function setTable(){
        return 'core_articles';
    }

    public function photo(){
        // return $this->photo;
        return $this->getfield('photo');
    }

    public function title(){
        // return $this->photo;
        return $this->getfield('title');
    }

    public function description(){
        // return $this->photo;
        return $this->getfield('description');
    }

}