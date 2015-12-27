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

    protected $name, $value;

    public function __construct($name, $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }


    public function getBody()
    {
        return $this->value;
    }

} 