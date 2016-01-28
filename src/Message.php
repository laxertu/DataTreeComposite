<?php
namespace MessageComposite;

/**
 * Composite implementation
 *
 * Class Message
 * @package MessageComposite
 */
abstract class Message extends DataTree implements MessageInterface
{
    private $attrs = [];


    final public function getAttributes()
    {
        return $this->attrs;
    }

    final public function setAttributes(array $attributes)
    {
        $this->attrs = $attributes;
    }

}
