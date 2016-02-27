<?php
namespace DataTree;

use DataTree\Formatter\FormattableInterface;
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

    final protected function setChild(FormattableInterface $element, $pos)
    {
        throw new \Exception('DataTreeElement objects does not have children');
    }

    final protected function removeChild($pos)
    {
        throw new \Exception('DataTreeElement objects does not have children');
    }
}
