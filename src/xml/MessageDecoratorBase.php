<?php
namespace MessageComposite\xml;
use MessageComposite\DataTreeInterface;
use MessageComposite\Formatter\xml\XMLFormattableInterface;
use MessageComposite\xml\MessageInterface;

abstract class MessageDecoratorBase implements MessageInterface, XMLFormattableInterface
{

    /** @var  MessageInterface */
    protected $message;

    public function __construct(MessageInterface $message)
    {
        $this->message = $message;
    }

    public function getName()
    {
        return $this->message->getName();
    }

    public function getAttributes()
    {
        return $this->message->getAttributes();
    }

    public function setName($name)
    {
        return $this->message->setName($name);
    }

    public function setAttributes(array $attributes)
    {
        return $this->message->setAttributes($attributes);
    }

    public function getValue()
    {
        return $this->message->getValue();
    }

    public function getChildren()
    {
        return $this->message->getChildren();
    }

    public function setParent(DataTreeInterface $message)
    {
        return $this->message->setParent($message);
    }

    public function getParent()
    {
        return $this->message->getParent();
    }

    public function setChild(DataTreeInterface $element, $pos)
    {
        return $this->message->setChild($element, $pos);
    }

    public function removeChild($pos)
    {
        return $this->message->removeChild($pos);
    }

    /**
     * Sets a Message raw value
     *
     * @param $value String | array
     */
    public function setValue($value = '')
    {
        return $this->setValue($value);
    }


}
