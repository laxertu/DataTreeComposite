<?php
namespace DataTree\xml;
use DataTree\DataTree;
use DataTree\DataTreeInterface;
use DataTree\Formatter\xml\XMLFormattableInterface;
use DataTree\OpenDataTree;
use DataTree\OpenDataTreeInterface;

/**
 * @package DataTree\xml
 * @see DataTree\tests\GenericMessageTest
 */
class GenericMessage extends Message
{
    public function __construct($name)
    {
        $this->setName($name);
    }

    public function setChild(MessageInterface $element, $pos)
    {
        return parent::setChild($element, $pos);
    }

    public function removeChild($pos)
    {
        return parent::removeChild($pos);
    }

}
