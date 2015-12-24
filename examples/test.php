<?php

namespace MessageComposite\examples;
use MessageComposite;

$autoload = function ($className) {

    $path = str_replace('MessageComposite\\', '', $className);
    $path = str_replace('\\', '/', $path) . '.php';

    include '../'.$path;
};

spl_autoload_register($autoload);

function output($x) {

    echo "\n\n".$x."\n\n";

}

$module = new MessageComposite\examples\auth_protocol\SystemSearchModule();
output($module->doSearch());
output($module->doSearch());

