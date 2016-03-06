<?php
namespace laxertu\DataTree\xml;
use laxertu\DataTree\DataTree;
use laxertu\DataTree\Processor\xml\XMLProcessableInterface;
use laxertu\DataTree\OpenDataTree;

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

    public function setChild(XMLProcessableInterface $element, $pos)
    {
        return parent::setChild($element, $pos);
    }

    public function removeChild($pos)
    {
        return parent::removeChild($pos);
    }

}
