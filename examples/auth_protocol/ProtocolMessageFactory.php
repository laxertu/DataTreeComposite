<?php
namespace MessageComposite\examples\auth_protocol;


use MessageComposite\MessageElement;

class ProtocolMessageFactory
{
    /** @var Credentials */
    private $credentials;

    public function __construct(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }


    public function getNewMessage($name)
    {

        $message = new ProtocolMessage();
        $message->setName($name);

    }

} 