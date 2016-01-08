<?php
namespace MessageComposite;

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
    private $parent;

    private $name = '';
    private $attrs = [];

    /**
     * Message raw content, used by MessageElement
     *
     * @var null
     */
    private $value = null;

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

    /**
     * Sets a Message raw value
     *
     * @param $value
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    protected final function setValue($value)
    {
        if($this->getChildren()) {
            throw new \Exception('Cannot set value of a composite Message');
        }

        #default to empty string as a null value means a Leaf Message
        if(is_null($value)) {
            $value = '';
        }

        $this->value = $value;
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
            return $this->parent->getPathWithSeparator($separator).$separator.$this->getName();
        } else {
            return $separator.$this->getName();
        }
    }

    /**
     * Child classes that needs some special behaviour before getting content can implement this method.
     */
    protected function prepare() {}

    /**
     * Sets $element as $pos child, it overwrites existent if any
     *
     * This method is declared as protected as often we want to give control about how a message is structured to
     * message itself. If you want more flexibility you have to extend GenericMessage. See examples
     *
     * @param MessageInterface $element
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    protected function setElement(Message $element, $pos)
    {
        if(!is_int($pos) || ($pos < 0)) {

            throw new \InvalidArgumentException('Pos have to be a positive integer');

        } elseif($this->getValue()){

            throw new \Exception('Cannot set a child if Message has a value');
        } else {
            $element->setParent($this);
            $this->elements[$pos] = $element;
        }
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
    public final function getValue()
    {
        return $this->value;
    }

    public final function isLeaf()
    {
        return ($this->value !== null);
    }

    public final function getChildren()
    {
        return $this->elements;
    }

} 