<?php
namespace MessageComposite\xml;

use MessageComposite\DataTreeInterface;
use MessageComposite\Formatter\xml\XMLFormattableInterface;

/**
 * Contract that a Message have to respect
 *
 * Interface MessageInterface
 * @package MessageComposite
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
