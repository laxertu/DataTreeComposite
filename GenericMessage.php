<?php
namespace MessageComposite;
/**
 * This class is intended for those who wants a 100% composite implementation. It only opens addElement method to clients
 *
 * Class GenericMessage
 * @package MessageComposite
 * @see MessageComposite\tests\GenericMessageTest
 */
class GenericMessage extends Message
{

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setElement(MessageInterface $element, $pos)
    {
        return parent::setElement($element, $pos);
    }

    public function removeElement($pos)
    {
        return parent::removeElement($pos);
    }


} 