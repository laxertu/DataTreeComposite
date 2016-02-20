<?php
namespace DataTree\Formatter;

/**
 * Contract for formattable objects: basically, the getters.
 *
 * Interface FormattableInterface
 * @package DataTree\Formatter
 */
interface FormattableInterface
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
     * @return FormattableInterface[]
     */
    public function getChildren();

    /**
     * @return FormattableInterface
     */
    public function getParent();
}
