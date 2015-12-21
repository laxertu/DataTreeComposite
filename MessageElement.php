<?php
namespace MessageComposite;


class MessageElement extends Message
{

    protected $name, $value;
    protected $isLeaf = true;

    public function __construct($name, $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    protected function getBody()
    {
        return $this;
    }

} 