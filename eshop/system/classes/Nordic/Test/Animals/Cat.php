<?

namespace Nordic\Test\Animals;

class Cat extends \Nordic\Test\Animals\Animal implements \Nordic\Interfaces\AnimalsActions\Run, \Nordic\Interfaces\AnimalsActions\Eat, \Nordic\Interfaces\AnimalsActions\Jump, \Nordic\Interfaces\AnimalsActions\Sleep
{
    
    public $NameAnimal = 'Кот';

    public function Eat(){
        echo 'Есть';
    }
    
    public function Jump(){
        echo 'Прыгать';
    }

    public function Run(){
        echo 'Бегать';
    }

    public function Sleep(){
        echo 'Спать';
    }

}