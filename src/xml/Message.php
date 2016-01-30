<?php
namespace MessageComposite\xml;

use MessageComposite\DataTree;
use MessageComposite\Formatter\xml\XMLFormattableInterface;

abstract class Message extends DataTree implements MessageInterface, XMLFormattableInterface
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
