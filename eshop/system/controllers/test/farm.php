<?

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Nordic/Interfaces/AnimalsActions/Eat.php');
// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Nordic/Interfaces/AnimalsActions/Jump.php');
// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Nordic/Interfaces/AnimalsActions/Run.php');
// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Nordic/Interfaces/AnimalsActions/Sleep.php');

// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Nordic/Test/Animals/Animal.php');

// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Nordic/Test/Animals/Cat.php');
// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Nordic/Test/Animals/Dog.php');
// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Nordic/Test/Animals/Pig.php');

$cat = new \Nordic\Test\Animals\Cat();
$cat->setNameAnimals($cat->NameAnimal);
echo $cat->getNameAnimals().' может делать:';
echo '<br>';
$cat->Eat();
echo '<br>';
$cat->Sleep();
echo '<br>';
$cat->Run();
echo '<br>';
$cat->Jump();

echo '<br><br>';

$Dog = new \Nordic\Test\Animals\Dog();
$Dog->setNameAnimals($Dog->NameAnimal);
echo $Dog->getNameAnimals().' может делать:';
echo '<br>';
$Dog->Eat();
echo '<br>';
$Dog->Sleep();
echo '<br>';
$Dog->Run();
echo '<br>';
$Dog->Jump();

echo '<br><br>';

$Pig = new \Nordic\Test\Animals\Pig();
$Pig->setNameAnimals($Pig->NameAnimal);
echo $Pig->getNameAnimals().' может делать:';
echo '<br>';
$Pig->Eat();
echo '<br>';
$Pig->Sleep();
echo '<br>';
$Pig->Run();
echo '<br>';
$Pig->Jump();