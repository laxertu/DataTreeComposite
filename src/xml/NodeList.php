<?php
namespace laxertu\DataTree\xml;

use laxertu\DataTree\DataTreeList;
use laxertu\DataTree\Processor\xml\XMLProcessableInterface;


class NodeList extends Node implements XMLProcessableInterface
{

    protected $isAList = true;

    final public function addNode(Node $node)
    {
        $this->addChild($node);
    }

}

