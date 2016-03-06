<?php
namespace laxertu\DataTree;

use laxertu\DataTree\Processor\ProcessableInterface;

/**
 * This class is intended for those who wants a 100% composite implementation. It just opens setter methods to clients
 *
 * Class DataTree
 * @package DataTree
 */
class OpenDataTree extends DataTree
{
    public function __construct($name)
    {
        $this->setName($name);
    }

    public function setChild(ProcessableInterface $element, $pos)
    {
        return parent::setChild($element, $pos);
    }

    public function removeChild($pos)
    {
        return parent::removeChild($pos);
    }

}
