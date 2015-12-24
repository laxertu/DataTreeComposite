<?php
namespace MessageComposite\examples\auth_protocol;
use MessageComposite\Message;
use MessageComposite\MessageElement;

class AuthNode extends Message
{



    public function __construct($usr, $pwd)
    {
        $this->name = 'Auth';
        $this->addElement(new MessageElement('usr', $usr));
        $this->addElement(new MessageElement('pwd', $pwd));

    }



} 