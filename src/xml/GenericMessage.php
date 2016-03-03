<?php
namespace DataTree\xml;
use DataTree\DataTree;
use DataTree\Processor\xml\XMLFormattableInterface;
use DataTree\OpenDataTree;

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

    public function setChild(XMLFormattableInterface $element, $pos)
    {
        return parent::setChild($element, $pos);
    }

    public function removeChild($pos)
    {
        return parent::removeChild($pos);
    }

}
