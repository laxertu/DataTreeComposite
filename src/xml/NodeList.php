<?php
namespace laxertu\DataTree\xml;

use laxertu\DataTree\DataTreeList;
use laxertu\DataTree\Processor\xml\XMLProcessableInterface;


class NodeList extends Node implements XMLProcessableInterface
{

    protected $isAList = true;

    final public function addTree(Node $node)
    {
        $this->addChild($node);
    }

}

