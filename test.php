<?php

namespace MessageComposite;

$autoload = function ($nombre_clase) {

    $arr = explode('\\', $nombre_clase);
    $nombre_clase = $arr[1];

    include $nombre_clase . '.php';
};

spl_autoload_register($autoload);

//$msg = new SearchMessage();

//$msg->setDateFrom('2015-02-03');
//$msg->setDateTo('2015-02-04');

//$msg->addBoard('nin');
//$msg->addBoard('bri');

//print_r($msg);

//output($msg->getBody());
//print_r($msg);

#-----------
$sp = new SearchParams();
$sp->setDateFrom('123');
$sp->setDateTo('456');
//$sp->addBoard('bri');
output($sp->getBody());


function output($x) {

    print_r(json_decode($x));
    echo $x."\n\n";

}