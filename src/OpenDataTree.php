<?php
namespace MessageComposite;

/**
 * This class is intended for those who wants a 100% composite implementation. It just opens setter methods to clients
 *
 * Class DataTree
 * @package MessageComposite
 */
class OpenDataTree extends DataTree implements OpenDataTreeInterface
{
    public function __construct($name)
    {
        $this->setName($name);
    }

    public function setChild(DataTreeInterface $element, $pos)
    {
        return parent::setChild($element, $pos);
    }

    public function removeChild($pos)
    {
        return parent::removeChild($pos);
    }

}
