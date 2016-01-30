<?php
namespace DataTree;

/**
 * Leaf classes.
 *
 * Class MessageElement
 * @package DataTree
 */
class DataTreeElement extends DataTree
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
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
    }

    final protected function setChild(MessageInterface $element, $pos)
    {
        throw new \Exception('MessageElement objects does not have children');
    }

    final protected function removeChild($pos)
    {
        throw new \Exception('MessageElement objects does not have children');
    }
}
