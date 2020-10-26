<?

include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/autoload.php');

// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Sprinting.php');
// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Jumping.php');
// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Throwing.php');

// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Sprinter.php');
// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Jumper.php');
// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Thrower.php');

// include_once($_SERVER['DOCUMENT_ROOT'].'/eshop/system/classes/Decathlete.php');

$sprinter = new \Nordic\Test\Decathlete\Sprinter();
$sprinter->sprinting();

echo '<br>';

$jumper = new \Nordic\Test\Decathlete\Jumper();
$jumper->jump();

echo '<br>';

$thrower = new \Nordic\Test\Decathlete\Thrower();
$thrower->throw();

echo '<br>';

$decathlete = new \Nordic\Test\Decathlete\Decathlete();

$decathlete->sprinting();
echo '<br>';
$decathlete->jump();
echo '<br>';
$decathlete->throw();
