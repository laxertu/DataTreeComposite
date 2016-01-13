<?php
namespace MessageComposite;

/**
 * Leaf classes.
 *
 * Class MessageElement
 * @package MessageComposite
 */
class MessageElement extends Message
{

    /**
     * @param $name
     * @param string $value
     * @throws \InvalidArgumentException
     */
    public final function __construct($name, $value = '')
    {
        try {
            $this->setName($name);
            $this->setValue($value);
        }catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    protected final function setElement(MessageInterface $element, $pos)
    {
        throw new \Exception('MessageElement objects does not have children');
    }

    protected final function removeElement($pos)
    {
        throw new \Exception('MessageElement objects does not have children');
    }
} 