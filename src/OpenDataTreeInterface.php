<?php
namespace MessageComposite;

use MessageComposite\Formatter\FormattableInterface;
use MessageComposite\Formatter\xml\XMLFormattableInterface;

interface OpenDataTreeInterface extends DataTreeInterface
{
    public function setChild(DataTreeInterface $element, $pos);

    public function removeChild($pos);

}
