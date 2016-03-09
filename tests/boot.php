<?php
$autoload = function ($className) {

    if(substr($className, 0, 16) == 'laxertu\DataTree')
    {
        $path = str_replace('laxertu\DataTree\\', '', $className);
        $path = str_replace('\\', '/', $path) . '.php';

        if (substr($className, 0, 22) == 'laxertu\DataTree\tests') {
            $path = '../'.$path;
        } else {
            $path = '../src/'.$path;
        }

        include $path;
    }



};

spl_autoload_register($autoload);
