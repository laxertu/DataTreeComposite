<?php

namespace DataTree;
use DataTree\Formatter\FormattableInterface;

/**
 * Composite implementation
 *
 * Class Message
 * @package DataTree
 */

abstract class DataTree implements FormattableInterface
{


    /** @var  Message */
    private $parent;

    /**
     * "Special" values are:
     *
     * NULL - means that class name will be used as node name
     * ''   - means that message has no node name
     *
     * @var null
     */
    private $name = null;


    /**
     * Message raw content as array or raw text, null for composites.
     *
     * @var null | array | String
     */
    private $value = null;

    /** @var Message[] */
    private $elements = [];


    /**
     * Returns node name
     *
     * @return string
     */
    final public function getName()
    {
        if (is_null($this->name)) {
            $this->name = end(explode('\\', get_class($this)));
        }

        return $this->name;
    }

    /**
     * Sets message name. See attribute documentation
     * @param $name
     */
    final public function setName($name)
    {
        $this->name = $name;
    }


    /**
     * Sets a Message raw value
     *
     * @param $value String | array
     * @throws \InvalidArgumentException
     */
    final public function setValue($value = '')
    {
        if ($this->getChildren()) {
            throw new \InvalidArgumentException('Cannot set value of a composite Message');
        }

        #default to empty string as a null value means a Leaf Message
        if (is_null($value)) {
            $value = '';
        }

        $this->value = $value;
    }


    final public function getPathWithSeparator($separator = '/')
    {

        if ($this->parent) {
            return $this->parent->getPathWithSeparator($separator).$separator.$this->getName();
        } else {
            return $separator.$this->getName();
        }
    }



    /**
     * Sets $element as $pos child, it overwrites existent if any
     *
     * This method is declared as protected as often we want to give control about how a tree is structured to
     * tree itself. If you want more flexibility you have to extend OpenDataTree.
     *
     * @param DataTreeInterface $element
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    protected function setChild(DataTreeInterface $element, $pos)
    {
        if (!is_int($pos) || ($pos < 0)) {

            throw new \InvalidArgumentException('Pos have to be a positive integer');

        } elseif ($this->getValue()) {

            throw new \Exception('Cannot set a child if child has a value');
        } else {
            $element->setParent($this);
            $this->elements[$pos] = $element;
        }
    }

    final public function setParent(DataTreeInterface $parent)
    {
        $this->parent = $parent;
    }

    final public function getParent()
    {
        return $this->parent;
    }

    /**
     * This method is declared as protected as often we want to give control about how a tree is structured to
     * tree itself. If you want more flexibility you have to extend OpenDataTree.
     *
     * @param Integer $pos
     */
    protected function removeChild($pos)
    {
        unset($this->elements[$pos]);
    }

    /**
     * @return null|String|array
     */
    final public function getValue()
    {
        return $this->value;
    }

    /**
     * @return DataTreeInterface[]
     */
    final public function getChildren()
    {
        return $this->elements;
    }

}
