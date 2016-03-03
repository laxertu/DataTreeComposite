<?php
namespace DataTree\xml;

use DataTree\DataTree;
use DataTree\Processor\xml\XMLProcessableInterface;

abstract class Message extends DataTree implements XMLProcessableInterface
{
    private $attrs = [];


    final public function getAttributes()
    {
        return $this->attrs;
    }

    final public function setAttributes(array $attributes)
    {
        $this->attrs = $attributes;
    }

}
