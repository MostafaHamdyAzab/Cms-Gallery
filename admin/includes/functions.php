<?php

function class_auto_loader($class){

    $class=strtolower($class);
    $path="includes/{$class}.php";

    if(is_file($path)&&!class_exists($path)){
    require_once($path);
       }//end class_auto_loader()

function redirect($location){
    header("Location: $location");
}

 }
 spl_autoload_register('class_auto_loader');





?>