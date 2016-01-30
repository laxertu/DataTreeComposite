<?php
namespace DataTree\Formatter\xml;
use DataTree\Formatter\FormattableInterface;

/**
 * Interface XMLFormattableInterface
 * @package DataTree\Formatter\xml
 */
interface XMLFormattableInterface extends FormattableInterface
{
    /**
     * Returns an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function getAttributes();


}
