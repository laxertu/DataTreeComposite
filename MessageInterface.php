<?php
namespace MessageComposite;

/**
 * Contract that a Message have to respect
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
     * Returns message value if any
     *
     * @return String
     */
    public function getValue();

    /**
     * @return MessageInterface[]
     */
    public function getChildren();


    /**
     * @return MessageInterface
     */
    public function getParent();

}