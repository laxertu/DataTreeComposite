<?php
namespace laxertu\DataTree\Processor;

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

    /**
     * @return bool
     */
    public function isAListOfTrees();
}
