<?php
// listing 03.01

use ShopProduct as GlobalShopProduct;

class ShopProduct
{
    // listing 03.04
    // listing 03.12
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price = 0;
    // listing 03.44
    public $discount = 0;
    // listing 03.30
    // public $numPages;
    // public $playLength;

    // listing 03.12
    // listing 03.22
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price
        // int $numPages = 0,
        // int $playLength = 0
    ) {
        $this->title = $title;
        $this->producerMainName = $mainName;
        $this->producerFirstName = $firstName;
        $this->price = $price;
        // $this->numPages = $numPages;
        // $this->playLength = $playLength;
    }

    // listing 03.48
    public function getProducerFirstName()
    {
        return $this->producerFirstName;
    }
    public function getProducerMainName()
    {
        return $this->producerMainName;
    }

    // listing 03.30
    public function getNumberOfPages()
    {
        return $this->numPages;
    }
    public function getPlayLength()
    {
        return $this->playLength;
    }
    // listing 03.44
    // listing 03.45
    public function getPrice()
    {
        return $this->price;
    }

    // listing 03.44
    public function setDiscount(int $num)
    {
        $this->discount = $num;
    }

    // listing 03.48
    public function getDiscount()
    {
        return $this->discount;
    }

    public function getTitle()
    {
        return $this->title;
    }

    // listing 03.10
    public function getProducer()
    {
        return $this->producerFirstName . " "
            . $this->producerMainName;
    }

    // listing 03.17
    /**
     * Outputs the list of addresses.
     * If $resolve is true then each address will be resolved
     * @param $resolve boolean Resolve the address?
     */
    public function outputAddresses($resolve)
    {
        if (is_string($resolve)) {
            $resolve =
                (preg_match("/^(false|no|off)$/i", $resolve)) ? false : true;
        }
        // ...
    }

    // listing 03.20
    public function write(ShopProduct $shopProduct)
    {
        // ...
    }

    // listing 03.31
    public function getSummaryLine()
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        // listing 03.35
        // if ($this->type == 'book') {
        //     $base .= ": page count - {$this->numPages}";
        // } elseif ($this->type == 'cd') {
        //     $base .= ": playing time - {$this->playLength}";
        // }
        return $base;
    }
}
// listing 03.18
class ShopProductWriter
{
    // listing 03.46
    public $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    public function write($shopProduct)
    {
        if (
            !($shopProduct instanceof CdProduct) &&
            !($shopProduct instanceof BookProduct)
        ) {
            die("wrong type supplied");
        }
        $str = $shopProduct->title . ": "
            . $shopProduct->getProducer()
            . " (" . $shopProduct->price . ")\n";
        print nl2br($str . "\r\n");
    }
}

// listing 03.28
class ConfReader
{
    public function getValues(array $default = null)
    {
        $values = [];
        // do something to get values
        // merge the provided defaults (it will always be an array)
        $values = array_merge($default, $values);
        return $values;
    }
}

// listing 03.32
class CdProduct extends ShopProduct
{
    public $playLength;
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $playLength
    ) {
       parent::__construct(
           $title,
           $firstName,
           $mainName,
           $price
       );
        $this->playLength = $playLength;
    }
    public function getPlayLength()
    {
        return $this->playLength;
    }
    public function getSummaryLine()
    {
        $base = "{$this->title} ( { $this->getProducerMainName}, ";
        $base .= "{$this->getProducerFirstName} )";
        $base .= ": playing time - {$this->playLength}";
        return $base;
    }
    public function getProducer()
    {
        return $this->producerFirstName . " "
            . $this->producerMainName;
    }
}

// listing 03.33
class BookProduct extends ShopProduct
{
    public $numPages;
    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages
    ) {
       // listing 03.40
       parent::__construct(
           $title,
           $firstName,
           $mainName,
           $price
       );
       $this->numPages = $numPages;
    }
    public function getNumberOfPages()
    {
        return $this->numPages;
    }
    public function getSummaryLine()
    {
        $base = parent::getSummaryLine();
        $base .= ": page count - {$this->numPages}";
        return $base;
    }
    public function getProducer()
    {
        return $this->producerFirstName . " "
            . $this->producerMainName;
    }

    public function getPrice()
    {
        return $this->price;
    }
}



// listing 03.19
// $product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
// $writer = new ShopProductWriter();
// $writer->write($product1);


// listing 03.21
// class Wrong
// {
// }
// $writer = new ShopProductWriter();
// $writer->write(new Wrong());

// listing 03.23
// will fail
// $product = new ShopProduct("title", "first", "main", []);

// listing 03.24
// $product = new ShopProduct("title", "first", "main", "4.22");

// listing 03.02
// $product1 = new ShopProduct();
// $product2 = new ShopProduct();

// listing 03.03
// var_dump($product1);
// var_dump($product2);

// listing 03.05
// $product1 = new ShopProduct();
// print $product1->title;

// listing 03.06
// $product1 = new ShopProduct();
// $product2 = new ShopProduct();
// $product1->title="My Antonia";
// $product2->title="Catch 22";




// listing 03.08
// $product1 = new ShopProduct();
// $product1->title = "My Antonia";
// $product1->producerMainName = "Cather";
// $product1->producerFirstName = "Willa";
// $product1->price = 5.99;

// listing 03.07
// $product1->arbitraryAddition = "treehouse";

// listing 03.09
// print "author: {$product1->producerFirstName} "
// . "{$product1->producerMainName} "." {$product1->arbitraryAddition}\n";

// listing 03.11
// print "author : {$product1->getProducer()}\n";


// listing 03.13
$product1 = new ShopProduct(
    "My Antonia",
    "Willa",
    "Cather",
    5.99
);

print nl2br("author: {$product1->getProducer()}\r\n");

class AddressManager
{
    private $addresses = ["209.131.36.159", "216.58.213.174"];
    public function outputAddresses(bool $resolve)
    {
        foreach ($this->addresses as $address) {
            print $address;
            if ($resolve) {
                print nl2br(" (" . gethostbyaddr($address) . ")\r\n");
            }
            print "\r\n";
        }
    }
}

// listing 03.16
if (file_exists('resolve.xml')) {
    $settings = simplexml_load_file('resolve.xml');
    $manager = new AddressManager();
    // listing 03.27
    // declare(strict_types=1);
    // listing 03.26
    // $manager->outputAddresses("false");
    $manager->outputAddresses((string)$settings->resolvedomains);
} else {
    exit('Failed to open test.xml.');
}


// listing 03.29
$product1 = new ShopProduct("My Antonia", "Willa", "Cather", 5.99);
// listing 03.44
print "The price is {$product1->price}\r\n";
$product2 = new ShopProduct(
    "Exile on Coldharbour Lane",
    "The",
    "Alabama 3",
    10.99
);
print "author: " . $product1->getProducer() . "\n";
print "artist: " . $product2->getProducer() . "\n";

// listing 03.38
print nl2br("listing 03.38 \r\n");

$product2 = new CdProduct(
    "Exile on Coldharbour Lane",
    "The",
    "Alabama 3", 
    10.99,
    0,
    60.33
    );
    print "artist: {$product2->getProducer()}\n";



    // listing 04.01
    class StaticExample
    {
        static public $aNum = 0;
        public static function sayHello()
        {
            self::$aNum++;
            echo self::$aNum;
        }
    }

// listing 05.21
$classname = "Task";
require_once("{$classname}.php");
$classname = "tasks\\$classname";
$myObj = new $classname();
$myObj->doSpeak();




?>
