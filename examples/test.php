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

$message = new SearchMessage();
$message->setDateFrom('2015-01-02');
$message->addBoard('nin');
$message->addBoard('bri');

$formatter = new MessageComposite\Formatter\XMLFormatter();
output($formatter->buildContent($message));

//print_r($message);

$module = new MessageComposite\examples\auth_protocol\SystemSearchModule();
//output($formatter->buildContent($));
output($module->doSearch());

