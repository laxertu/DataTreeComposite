<?php
namespace MessageComposite;


class DateSearchParam extends MessageElement
{

    protected $name = 'date';

    public function __construct($date) {
        $this->value = $date;
    }

} 