<?php
namespace MessageComposite\examples\auth_protocol;
use MessageComposite\Message;
use MessageComposite\MessageElement;

class AuthNode extends Message
{
    protected  $name = 'Auth';
    private    $usr, $pwd;

    public function __construct($usr, $pwd)
    {
        $this->usr = $usr;
        $this->pwd = $pwd;
    }

    protected function prepare()
    {
        $this->addElement(new MessageElement('usr', $this->usr));
        $this->addElement(new MessageElement('pwd', $this->pwd));

    }



} 