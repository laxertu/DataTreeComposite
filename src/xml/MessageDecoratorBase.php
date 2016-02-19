<?php
namespace DataTree\xml;

use DataTree\Formatter\xml\XMLFormattableInterface;

abstract class MessageDecoratorBase implements XMLFormattableInterface
{

    /** @var  XMLFormattableInterface */
    protected $message;

    public function __construct(XMLFormattableInterface $message)
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
