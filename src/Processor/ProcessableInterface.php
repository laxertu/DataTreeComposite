<?php
namespace DataTree\Processor;

/**
 * Contract for formattable objects: basically, the getters.
 *
 * Interface ProcessableInterface
 * @package DataTree\Formatter
 */
interface ProcessableInterface
{

    /**
     * @return String
     */
    public function getName();

    /**
     * Message raw content as array or raw text, null for composites.
     *
     * @return null | array | String
     */
    public function getValue();

    /**
     * @return ProcessableInterface[]
     */
    public function getChildren();

    /**
     * @return ProcessableInterface
     */
    public function getParent();
}
