<?php
namespace MessageComposite;

/**
 * This class is intended for those who wants a 100% composite implementation. It just opens setter methods to clients
 *
 * Class GenericMessage
 * @package MessageComposite
 * @see MessageComposite\tests\GenericMessageTest
 */
class GenericMessage extends Message
{

    public function __construct($name)
    {
        $this->setName($name);
    }

    final public function setElement(MessageInterface $element, $pos)
    {
        return parent::setElement($element, $pos);
    }

    final public function removeElement($pos)
    {
        return parent::removeElement($pos);
    }
}
