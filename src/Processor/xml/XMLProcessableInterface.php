<?php
namespace laxertu\DataTree\Processor\xml;
use laxertu\DataTree\Processor\ProcessableInterface;

/**
 * Interface XMLFormattableInterface
 * @package DataTree\Formatter\xml
 */
interface XMLProcessableInterface extends ProcessableInterface
{
    /**
     * Returns an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function getAttributes();


}
