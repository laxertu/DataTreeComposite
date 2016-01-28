<?php
namespace MessageComposite\xml;

use MessageComposite\DataTreeInterface;

abstract class MessageDecoratorBase implements MessageInterface
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

    public function getParent()
    {
        return $this->message->getParent();
    }
}
