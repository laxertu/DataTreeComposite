<?php
namespace laxertu\DataTree\xml;

use laxertu\DataTree\DataTreeList;
use laxertu\DataTree\Processor\xml\XMLProcessableInterface;

/**
 * Class NodeList
 * @package laxertu\DataTree\xml
 * @see laxertu\DataTree\tests\NodeListTest
 */
class NodeList extends Node
{

    protected $isAList = true;

    final public function addNode(XMLProcessableInterface $node)
    {
        $this->addChild($node);
    }

}

