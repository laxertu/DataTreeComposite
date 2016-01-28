<?php
namespace MessageComposite\xml;

use MessageComposite\DataTreeInterface;

/**
 * Contract that a Message have to respect
 *
 * Interface MessageInterface
 * @package MessageComposite
 */
interface MessageInterface extends DataTreeInterface
{

    /**
     * Returns an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Sets an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function setAttributes(array $attributes);



}
