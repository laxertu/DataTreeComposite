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

    public function getName();
    public function setName($name);

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
    public function setAttributes($attributes);


    /**
     * Message raw content as array or raw text, null for composites.
     *
     * @var null | array | String
     */
    public function getValue();

    /**
     * @return MessageInterface[]
     */
    public function getChildren();

    /**
     * @param MessageInterface $parent
     */
    public function setParent(MessageInterface $parent);

    /**
     * @return MessageInterface
     */
    public function getParent();
}
