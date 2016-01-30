<?php
namespace MessageComposite\Formatter\xml;
use MessageComposite\Formatter\FormattableInterface;

/**
 * Interface XMLFormattableInterface
 * @package MessageComposite\Formatter\xml
 */
interface XMLFormattableInterface extends FormattableInterface
{
    /**
     * Returns an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function getAttributes();


}
