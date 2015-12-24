<?php
namespace MessageComposite\examples\auth_protocol;


use MessageComposite\Message;

class ProtocolMessage
{
    /** @var  Message */
    private $message;

    public final function __construct(Credentials $credentials, Message $message)
    {
        $auth = new AuthNode($credentials->getUsr(), $credentials->getPwd());
        $message->addElement($auth);
        $this->message = $message;
    }


    protected function addElement(Message $element)
    {
        $this->message->addElement($element);
    }

    public function getContent()
    {
        return $this->message->getContent();
    }


} 