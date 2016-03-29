<?php
namespace laxertu\DataTree\xml;
use laxertu\DataTree\Processor\xml\XMLProcessableInterface;

/**
 * Leaf classes.
 *
 * Class NodeElement
 * @package DataTree
 */
class NodeElement extends Message
{

    /**
     * @param $name
     * @param string $value
     * @throws \InvalidArgumentException
     */
    final public function __construct($name, $value = '')
    {
        try {
            $this->setName($name);
            $this->setValue($value);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    final protected function setChild(XMLProcessableInterface $element, $pos)
    {
        throw new \Exception('NodeElement objects does not have children');
    }

    final protected function removeChild($pos)
    {
        throw new \Exception('NodeElement objects does not have children');
    }
}