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

    protected $name, $value;

    public final function __construct($name, $value = '')
    {
        if(!is_null($value)) {
            $this->name  = $name;
            $this->value = $value;
        } else {
            throw new \InvalidArgumentException('Value cannot be NULL');
        }
    }
} 