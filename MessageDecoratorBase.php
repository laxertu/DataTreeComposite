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

    public function getBody(Formatter $formatter)
    {
        return $this->message->getBody($formatter);
    }



} 