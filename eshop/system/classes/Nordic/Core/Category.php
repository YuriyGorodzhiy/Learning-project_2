<?php

namespace Nordic\Core;

class Category extends \Nordic\Core\Unit
{

    // переопределение метода (полиморфизм)
    public function setTable(){
        return 'categories';
    }
    

}