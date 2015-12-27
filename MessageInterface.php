<?php
namespace MessageComposite;
use MessageComposite\Formatter\Formatter;

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
     * Returns full message plain text content (with head and foot)
     *
     * @return String
     */

    public function getContent(Formatter $formatter);


    /**
     * Returns message plain text content (without head and foot)
     *
     * @return String
     */
    public function getBody(Formatter $formatter);

}