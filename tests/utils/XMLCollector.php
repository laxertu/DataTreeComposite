<?php
namespace laxertu\DataTree\tests\utils;

use laxertu\DataTree\xml\Message;

class XMLCollector
{

    public function getNumNodeOccurrences($xml, Message $message)
    {

        $nodeName = $message->getPathWithSeparator('/');
        $parsed = new \SimpleXMLElement($xml);

        return count($parsed->xpath($nodeName));

    }
}
