<?php
namespace MessageComposite;
use MessageComposite\Formatter\Formatter;
use MessageComposite\Formatter\XMLFormatter;

/**
 * Composite implementation
 *
 * Class Message
 * @package MessageComposite
 */
abstract class Message implements MessageInterface
{

    /** @var Message[] */
    private $elements = [];

    /** @var  Message */
    protected $parent;

    protected $name = '';
    protected $attrs = [];

    /**
     * Message raw content, used by MessageElement
     *
     * @var null
     */
    protected $value = null;

    /**
     * Returns node name
     *
     * @return string
     */
    public final function getName()
    {
        if(!$this->name) {
            $this->name = end(explode('\\', get_class($this)));
        }

        return $this->name;
    }

    public final function setName($name)
    {
        $this->name = $name;
    }

    public final function getAttributes()
    {
        return $this->attrs;
    }

    public final function setAttributes($attributes)
    {
        $this->attrs = $attributes;
    }

    public final function getPathWithSeparator($separator = '/')
    {

        if($this->parent) {
            return $this->parent->getPathWithSeparator($separator).'/'.$this->getName();
        } else {
            return '/'.$this->getName();
        }
    }

    /**
     * Child classes that needs some special behaviour before getting content can implement this method.
     *
     * @see GenericMessage
     */
    protected function prepare() {}

    /**
     * Sets $element as $pos child, it overwrites existent if any
     *
     * This method is declared as protected as often we want to give control about how a message is structured to
     * message itself. If you want more flexibility you have to extend GenericMessage. See examples
     *
     * @param MessageInterface $element
     */
    protected function setElement(Message $element, $pos)
    {
        $element->setParent($this);
        $this->elements[$pos] = $element;
    }

    private function setParent(Message $parent)
    {
        $this->parent = $parent;
    }

    public final function getParent()
    {
        return $this->parent;
    }

    /**
     * This method is declared as protected as often we want to give control about how a message is structured to
     * message itself. If you want more flexibility you have to extend GenericMessage. See examples
     *
     * @param MessageInterface $element
     */
    protected function removeElement($pos)
    {
        unset($this->elements[$pos]);
    }

    /**
     * Gets raw content if setted
     *
     * @return null|String
     */
    public final function getBody()
    {
        return $this->value;
    }

    public final function isLeaf()
    {
        return ($this->value !== null);
    }

    public final function getChildren()
    {
        $this->prepare();
        return $this->elements;
    }

} 