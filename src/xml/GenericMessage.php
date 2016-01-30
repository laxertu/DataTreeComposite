<?php
namespace MessageComposite\xml;
use MessageComposite\DataTree;
use MessageComposite\DataTreeInterface;
use MessageComposite\Formatter\xml\XMLFormattableInterface;
use MessageComposite\OpenDataTree;
use MessageComposite\OpenDataTreeInterface;

/**
 * @package MessageComposite\xml
 * @see MessageComposite\tests\GenericMessageTest
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
