<?php
namespace MessageComposite\xml;
use MessageComposite\DataTree;
use MessageComposite\DataTreeInterface;
use MessageComposite\Formatter\xml\XMLFormattableInterface;
use MessageComposite\OpenDataTree;
use MessageComposite\OpenDataTreeInterface;

/**
 * Class GenericMessage
 *
 * just overrides some method for type enforcing purposes
 *
 * @package MessageComposite\xml
 * @see MessageComposite\tests\GenericMessageTest
 */
class GenericMessage extends Message implements OpenDataTreeInterface
{
    public function __construct($name)
    {
        $this->setName($name);
    }

    public function setElement(DataTreeInterface $element, $pos)
    {
        return parent::setElement($element, $pos);
    }

    public function removeElement($pos)
    {
        return parent::removeElement($pos);
    }

}
