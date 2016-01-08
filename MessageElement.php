<?php
namespace MessageComposite;
use MessageComposite\Formatter\Formatter;

/**
 * Leaf classes.
 *
 * Class MessageElement
 * @package MessageComposite
 */
class MessageElement extends Message
{

    protected $value;

    public final function __construct($name, $value = '')
    {
        if(!is_null($value)) {
            $this->setName($name);
            $this->value = $value;
        } else {
            throw new \InvalidArgumentException('Value cannot be NULL');
        }
    }

    protected final function setElement(Message $element, $pos)
    {
        throw new \Exception('MessageElement objects does not have children');
    }

    protected final function removeElement($pos)
    {
        throw new \Exception('MessageElement objects does not have children');
    }
} 