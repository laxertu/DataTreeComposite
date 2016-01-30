<?php
namespace MessageComposite\Formatter\xml;
use MessageComposite\Formatter\FormattableInterface;

interface XMLFormattableInterface extends FormattableInterface
{
    /**
     * Returns an associative array in a key => value form with attributes
     *
     * @return array
     */
    public function getAttributes();


}
