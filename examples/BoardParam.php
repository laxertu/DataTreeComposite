<?php
namespace MessageComposite\examples;


class BoardParam extends \MessageComposite\MessageElement
{

    protected $name = 'board';

    public function __construct($code) {
        $this->value = $code;
    }

} 