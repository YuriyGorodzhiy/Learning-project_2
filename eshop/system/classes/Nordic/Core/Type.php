<?php

namespace Nordic\Core;

class Type extends \Nordic\Core\Unit
{

    // переопределение метода (полиморфизм)
    public function setTable(){
        return 'itemtypes';
    }
    

}