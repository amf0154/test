<?php
function __autoload($class_name) // function for autoload files
{
    $array_paths = array( // array with including directories 
        '/models/',
        '/components/',
        '/controllers/',
    );
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}

