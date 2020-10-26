<?

namespace Nordic\Test\Animals;

abstract class Animal
{
    public $NameAnimal;

    public function getNameAnimals(){
        return $this->NameAnimal;
    }
    
    public function setNameAnimals($NameAnimal){
        $this->NameAnimal = $NameAnimal;
    }

}