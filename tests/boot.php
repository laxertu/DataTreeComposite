<?php
$autoload = function ($className) {

    if(substr($className, 0, 8) == 'DataTree')
    {
        $path = str_replace('DataTree\\', '', $className);
        $path = str_replace('\\', '/', $path) . '.php';

        if (substr($className, 0, 14) == 'DataTree\tests') {
            $path = '../'.$path;
        } elseif (substr($path, 0, 9) != 'examples/') {
            $path = '../src/'.$path;
        } else {
            $path = '../'.$path;

        }

        include $path;
    }



};

spl_autoload_register($autoload);
