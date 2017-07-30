<?php

namespace laxertu\DataTree;
use laxertu\DataTree\Processor\ProcessableInterface;

/**
 * Composite implementation
 *
 * Base class for different kinds of tree
 *
 * @see DataTree
 * Use this class for defining trees that have a named set of children.
 * Children can be one of the following, or another DataTree
 *
 * @see DataTreeList
 * if you want to build a list of trees
 *
 * @see DataTreeElement
 * for simple values representation (arrays are supported too)
 *
 * @package DataTree
 */

abstract class DataTreeBase implements ProcessableInterface
{


    /** @var  DataTree */
    private $parent;

    /**
     * "Special" values are:
     *
     * NULL - means that class name will be used as tree name
     * ''   - means that tree has no name
     *
     * @var null
     */
    private $name = null;


    protected $isAList = false;


    /**
     * DataTree raw content, it cannot be set with composite objects.
     *
     * @var null | array | String
     */
    private $value = null;

    /** @var DataTree[] */
    private $elements = [];


    /**
     * Returns DataTree name
     *
     * @return string
     */
    final public function getName()
    {
        if (is_null($this->name)) {
            $this->name = end(explode('\\', get_called_class()));
        }

        return $this->name;
    }

    /**
     * @return bool
     */
    final public function isAListOfTrees()
    {
        return $this->isAList;
    }

    /**
     * Sets DataTree name. See attribute documentation
     * @param $name
     */
    final public function setName($name)
    {
        $this->name = $name;
    }


    /**
     * Sets a DataTree raw value
     *
     * @param $value String | array | null
     * @throws \InvalidArgumentException
     */
    final public function setValue($value = '')
    {
        if ($this->getChildren() || $this->isAListOfTrees()) {
            throw new \InvalidArgumentException('Cannot set value of a composite DataTree');
        }


        $this->value = $value;
    }

    /**
     * Useful -for example- for building xPath strings
     *
     * @param string $separator
     * @return string
     */
    final public function getPathWithSeparator($separator = '/')
    {

        if ($this->parent) {
            return $this->parent->getPathWithSeparator($separator).$separator.$this->getName();
        } else {
            return $separator.$this->getName();
        }
    }



    /**
     * Sets $element as $pos child, overwrites existent if any
     *
     * @param DataTreeBase $element
     * @throws \InvalidArgumentException
     */
    protected function setChild(DataTreeBase $element, $pos)
    {
        if (!is_int($pos) || ($pos < 0)) {

            throw new \InvalidArgumentException('Pos have to be a positive integer');

        } elseif ($this->getValue()) {

            throw new \InvalidArgumentException('Cannot set a child if tree is a leaf one');
        } else {
            $element->setParent($this);
            $this->elements[$pos] = $element;
        }
    }


    /**
     * Adds a tree to children's list. Returns key generated
     *
     * @param DataTreeBase $tree
     * @return int
     */
    protected function addChild(DataTreeBase $tree)
    {
        $index = $this->generateIndex();
        $this->setChild($tree, $index);
        return $index;
    }

    private function generateIndex()
    {
        $children = $this->getChildren();
        return ($children) ? max(array_keys($children)) + 1 : 0;
    }


    final public function setParent(DataTreeBase $parent)
    {
        $this->parent = $parent;
    }

    final public function getParent()
    {
        return $this->parent;
    }

    /**
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
     * @return DataTreeBase[]
     */
    final public function getChildren()
    {
        return $this->elements;
    }

}
