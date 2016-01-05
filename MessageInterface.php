<?php
namespace MessageComposite;
use MessageComposite\Formatter\Formatter;

/**
 * Contract that a Message have to respect for be used by formatters
 *
 * Interface MessageInterface
 * @package MessageComposite
 */
interface MessageInterface
{

    /** Returns Message name */
    public function getName();

    /** Sets message name */
    public function setName($name);

    /**
     * Return an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Sets an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function setAttributes($attributes);


    /**
     * Returns message plain text content (without head and foot)
     *
     * @return String
     */
    public function getBody(Formatter $formatter);

}