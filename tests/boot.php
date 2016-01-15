<?php
$autoload = function ($className) {


    $path = str_replace('MessageComposite\\', '', $className);
    $path = str_replace('\\', '/', $path) . '.php';

    if (substr($className, 0, 22) == 'MessageComposite\tests') {
        $path = '../'.$path;
    } elseif (substr($path, 0, 9) != 'examples/') {
        $path = '../src/'.$path;
    } else {
        $path = '../'.$path;

    }


    if (file_exists($path)) {
        include $path;
    }

};

spl_autoload_register($autoload);
