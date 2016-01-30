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

    public function setElement(DataTreeInterface $element, $pos)
    {
        return parent::setElement($element, $pos);
    }

    public function removeElement($pos)
    {
        return parent::removeElement($pos);
    }

}
