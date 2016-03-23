<?php
namespace laxertu\DataTree\tests;


function oStr($s)
{
    echo "\n".$s."\n\n";
}

function oJson($json)
{
    print_r(json_decode($json, true));
}