<?php
namespace MessageComposite\xml;

use MessageComposite\DataTree;

abstract class Message extends DataTree implements MessageInterface
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
