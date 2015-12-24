<?php

namespace MessageComposite\examples;
use MessageComposite;

$autoload = function ($className) {

    $path = str_replace('MessageComposite\\', '', $className);
    $path = str_replace('\\', '/', $path) . '.php';

    include '../'.$path;
};



function output($x) {

    echo "\n\n".$x."\n\n";

}

spl_autoload_register($autoload);


$msg = new SearchMessage();

$msg->setDateFrom('2015-02-03');
$msg->setDateTo('2015-02-04');

$msg->addBoard('nin');
$msg->addBoard('bri');
$credentials = new MessageComposite\examples\auth_protocol\Credentials();
$p = new MessageComposite\examples\auth_protocol\ProtocolMessage($credentials, $msg);

output($p->getContent());

