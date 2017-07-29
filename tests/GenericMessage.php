<?php
namespace laxertu\DataTree\tests;
use laxertu\DataTree\DataTreeBase;
use laxertu\DataTree\Processor\ProcessableInterface;


/**
 * @package DataTree\xml
 * @see DataTree\tests\GenericMessageTest
 */
class GenericMessage extends DataTreeBase implements ProcessableInterface
{
    public function __construct($name)
    {
        $this->setName($name);
    }

    public function setChild(DataTreeBase $element, $pos)
    {
        return parent::setChild($element, $pos);
    }

    public function removeChild($pos)
    {
        return parent::removeChild($pos);
    }

}
