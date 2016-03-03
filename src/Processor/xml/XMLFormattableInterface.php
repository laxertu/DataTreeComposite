<?php
namespace DataTree\Processor\xml;
use DataTree\Processor\ProcessableInterface;

/**
 * Interface XMLFormattableInterface
 * @package DataTree\Formatter\xml
 */
interface XMLFormattableInterface extends ProcessableInterface
{
    /**
     * Returns an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function getAttributes();


}
