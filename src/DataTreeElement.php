<?php
namespace laxertu\DataTree;

use laxertu\DataTree\Processor\ProcessableInterface;
/**
 * Leaf classes.
 *
 * Class DataTreeElement
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

    final protected function setChild(ProcessableInterface $element, $pos)
    {
        throw new \Exception('DataTreeElement objects do not have children');
    }

    final protected function removeChild($pos)
    {
        throw new \Exception('DataTreeElement objects do not have children');
    }
}
