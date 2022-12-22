<?php

define('BASE_URL', 'http://ship_cruise.local/');
require_once '../app/config/helper.php';

spl_autoload_register('autoload');


function autoload($className) {

    $arrayPaths = array(
        '../app/controllers/' ,
        '../app/models/' ,
        '../app/core/'
    );

    $parts = explode('\\' , $className);

    $name = array_pop($parts);

    foreach($arrayPaths as $path) {

        $file = sprintf($path . '%s.php' , $name);

        if(is_file($file)) {
            require_once $file;
        }

    }

}