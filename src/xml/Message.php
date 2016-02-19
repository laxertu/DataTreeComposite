<?php
namespace DataTree\xml;

use DataTree\DataTree;
use DataTree\Formatter\xml\XMLFormattableInterface;

abstract class Message extends DataTree implements XMLFormattableInterface
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
