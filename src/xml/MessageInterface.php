<?php
namespace DataTree\xml;

use DataTree\DataTreeInterface;
use DataTree\Formatter\xml\XMLFormattableInterface;

/**
 * Contract that a Message have to respect
 *
 * Interface MessageInterface
 * @package DataTree
 */
interface MessageInterface extends DataTreeInterface
{

    /**
     * Sets an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function setAttributes(array $attributes);


}
