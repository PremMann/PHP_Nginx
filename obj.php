<?php 
class obj
{
    public $school;

    public function setSchool(& $school)
    {
        // $school is now a reference to not a copy of passed object 
    }
    
    public function & getSchool()
    {
        // returning a reference not a copy 
        return $this->school;
    }

}

class megaquiz_util_Conf
{

}

// First Class
class ShopProduct
{
    // class body
    public $title = "default product";
    public $producerMainName = "main name";
    public $producerFirstName = "first name";
    public $price = 0;

    public function __construct(
        $title,
        $firstName,
        $mainName,
        $price
        ) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
        }
        

    public function getProducer()
{
return $this->producerFirstName . " "
. $this->producerMainName;
}
}

$product1 = new ShopProduct(
    "My Antonia",
    "Willa","Cather",
    5.99
);
// echo $product1->title;
$product2 = new ShopProduct(
    "My Antonia",
    "Willa","Cather",
    5.99
);

// listing 03.06
$product1 = new ShopProduct(
    "My Antonia",
    "Willa","Cather",
    5.99
);
$product2 = new ShopProduct(
    "My Antonia",
    "Willa","Cather",
    5.99
);
$product1->title="My Antonia";
$product2->title="Catch 22";

// listing 03.07
$product1->arbitraryAddition = "treehouse";

// listing 03.08
$product1 = new ShopProduct(
    "My Antonia",
    "Willa","Cather",
    5.99
);
$product1->title = "My Antonia";
$product1->producerMainName = "Cather";
$product1->producerFirstName = "Willa";
$product1->price = 5.99;


// listing 03.09
// print "author: {$product1->producerFirstName} "
// . "{$product1->producerMainName}\n";

print "author: {$product1->getProducer()}\n";


class StaticExample
{
    static public $aNum = 0;
    public static function sayHello()
    {
        self::$aNum++;
        print "hello (".self::$aNum.")\n";
    }
}
print StaticExample::$aNum;
StaticExample::sayHello();

?>