<?php
namespace DataTree\Formatter;

/**
 * Contract for formattable objects: basically, the basic getters.
 *
 * Interface FormattableInterface
 * @package DataTree\Formatter
 */
interface FormattableInterface
{

    public function getName();

    /**
     * Message raw content as array or raw text, null for composites.
     *
     * @var null | array | String
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
