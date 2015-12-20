<?php
namespace MessageComposite\examples;


class DateSearchParam extends \MessageComposite\MessageElement
{

    protected $name = 'date';

    public function __construct($date) {
        $this->value = $date;
    }

} 