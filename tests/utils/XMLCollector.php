<?php
namespace DataTree\tests\utils;

use DataTree\xml\Message;

class XMLCollector
{

    public function getNumNodeOccurrences($xml, Message $message)
    {

        $nodeName = $message->getPathWithSeparator('/');
        $parsed = new \SimpleXMLElement($xml);

        return count($parsed->xpath($nodeName));

    }
}
