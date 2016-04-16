<?php
namespace laxertu\DataTree\tests\utils;

use laxertu\DataTree\Processor\xml\XMLProcessableInterface;
use laxertu\DataTree\xml\Message;

class XMLCollector
{

    public function getNumNodeOccurrences($xml, XMLProcessableInterface $node)
    {

        $nodeName = $node->getPathWithSeparator('/');
        $parsed = new \SimpleXMLElement($xml);

        return count($parsed->xpath($nodeName));

    }
}
