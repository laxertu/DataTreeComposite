<?php
namespace laxertu\DataTree;

use laxertu\DataTree\Processor\ProcessableInterface;
/**
 * Leaf classes. @see DataTreeBase::setValue
 *
 * Class DataTreeElement
 * @package DataTree
 */
class DataTreeElement extends DataTreeBase
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

    /**
     * @throws \InvalidArgumentException
     */
    final protected function setChild(ProcessableInterface $element, $pos)
    {
        throw new \InvalidArgumentException('DataTreeElement objects do not have children');
    }

    /**
     * @throws \InvalidArgumentException
     */
    final protected function removeChild($pos)
    {
        throw new \InvalidArgumentException('DataTreeElement objects do not have children');
    }
}
