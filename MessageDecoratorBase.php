<?php
namespace MessageComposite;

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

    /** Sets message name */
    public function setName($name)
    {
        return $this->message->setName($name);
    }

    public function setAttributes($attributes)
    {
        return $this->message->setAttributes($attributes);
    }

    public function getBody()
    {
        return $this->message->getBody();
    }

    public function getChildren()
    {
        return $this->message->getChildren();
    }

    public function isLeaf() {
        return $this->message->isLeaf();
    }

    public function getParent()
    {
        return $this->message->getParent();
    }

} 