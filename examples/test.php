<?php

namespace MessageComposite\examples;
use MessageComposite;

$autoload = function ($className) {

    $path = str_replace('MessageComposite\\', '', $className);
    $path = str_replace('\\', '/', $path) . '.php';

    include '../'.$path;
};

spl_autoload_register($autoload);

$msg = new SearchMessage();

$msg->setDateFrom('2015-02-03');
$msg->setDateTo('2015-02-04');

$msg->addBoard('nin');
$msg->addBoard('bri');

output($msg->getBody());


#-----------
$sp = new SearchParams();
$sp->setDateFrom('123');
$sp->setDateTo('456');

output($sp->getBody());


function output($x) {

    echo $x."\n\n";

}