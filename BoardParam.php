<?php
namespace MessageComposite;


class BoardParam extends MessageElement
{

    protected $name = 'board';

    public function __construct($code) {
        $this->value = $code;
    }

} 