<?php
namespace MessageComposite;
use MessageComposite\Formatter\Formatter;


abstract class MessageDecoratorBase implements MessageInterface
{

    /** @var  MessageInterface */
    protected $message;

    public function __construct(MessageInterface $message)
    {
        $this->message = $message;
    }


    public final function getName()
    {
        return $this->message->getName();
    }

    public final function getAttributes()
    {
        return $this->message->getAttributes();
    }

    /** Sets message name */
    public final function setName($name)
    {
        return $this->message->setName($name);
    }

    public final function setAttributes($attributes)
    {
        return $this->message->setAttributes($attributes);
    }

    public final function getBody()
    {
        return $this->message->getBody();
    }

    public final function getChildren()
    {
        return $this->message->getChildren();
    }

    public final function isLeaf() {
        return $this->message->isLeaf();
    }

} 