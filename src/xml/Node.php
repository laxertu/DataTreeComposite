<?php
namespace laxertu\DataTree\xml;
use laxertu\DataTree\DataTree;
use laxertu\DataTree\Processor\xml\XMLProcessableInterface;

abstract class Node extends DataTree implements XMLProcessableInterface
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

    final public function setAttribute($name, $value)
    {
        $this->attrs[$name] = $value;
    }

}
