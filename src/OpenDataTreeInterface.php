<?php
namespace DataTree;

use DataTree\Formatter\FormattableInterface;
use DataTree\Formatter\xml\XMLFormattableInterface;

interface OpenDataTreeInterface extends DataTreeInterface
{
    public function setChild(DataTreeInterface $element, $pos);

    public function removeChild($pos);

}
