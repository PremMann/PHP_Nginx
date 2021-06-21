<?php
require_once("localPath.php");
// listing 01.04
$basic = function ($classname){
    $file = "{$classname}.php";
    if(file_exists($file)){
        require_once($file);

    }
};
\spl_autoload_register($basic);

$blah = new Blah();
$blah->wave();




// listing 05.16
$underscores = function($classname){
    $path = str_replace('_', DIRECTORY_SEPARATOR, $classname);
    if(file_exists("{$path}.php")){
        require_once("{$path}.php");
    }
};

\spl_autoload_register($underscores);

$blah = new util_Blah();
$blah->wave();



// listing 05.18
$namespaces = function($path)
{
    if(preg_match('/\\\\/', $path)){
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    }
    if(file_exists("{$path}.php")){
        require_once("{$path}.php");
    }
};

\spl_autoload_register($namespaces);
$obj = new util\localPath();
// $obj = new util\localPath();
$obj->wave();



// listing 05.19
\spl_autoload_register($namespaces);
\spl_autoload_register($underscores);
$blah = new util_Blah();
$blah->wave();
$obj = new util\LocalPath();
$obj->wave();

