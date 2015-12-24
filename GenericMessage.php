<?php
namespace MessageComposite;
/**
 * This class is intended for those who wants a 100% composite implementation. It only opens addElement method to clients
 *
 * Class GenericMessage
 * @package MessageComposite
 */
class GenericMessage extends Message
{

    public function addElement(Message $element)
    {
        return parent::addElement($element);
    }

} 