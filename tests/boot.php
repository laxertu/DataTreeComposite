<?php
$autoload = function ($className) {


    $path = str_replace('MessageComposite\\', '', $className);
    $path = str_replace('\\', '/', $path) . '.php';
    $path = '../'.$path;

    if (file_exists($path)) {
        include $path;
    }

};

spl_autoload_register($autoload);
