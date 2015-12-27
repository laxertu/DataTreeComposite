<?php
namespace MessageComposite\examples\auth_protocol;
use MessageComposite\Formatter\Formatter;
use MessageComposite\GenericMessage;
use MessageComposite\Message;
use MessageComposite\MessageElement;

/**
 * An example of use of Message class to implement an auth based protocol.
 *
 * All calls needs an Auth node for credentials. This one is a decorator that permits setting it
 *
 * Class ProtocolMessage
 * @package MessageComposite\examples\auth_protocol
 */
class ProtocolMessage
{
    /** @var  ApiMethodBase */
    private $message;

    /** @var  AuthNode */
    private $authNode;

    public final function __construct(Credentials $credentials, Message $message)
    {
        $this->authNode = new AuthNode($credentials->getUsr(), $credentials->getPwd());
        $this->message = $message;
    }


    public function getContent(Formatter $formatter)
    {
        /*
        $message = new GenericMessage();
        $message->setName($this->message->getName());
        $message->addElement($this->authNode);
        $message->addElement($this->message->getBody()->getValue());

        return $message->getContent();
        */

        //return $message->getContent($formatter);
        $message = new GenericMessage($this->message->getName());
        $message->addElement($this->authNode);

    }


    public function getName()
    {
        return $this->message->getName();
    }

    public function getAttributes()
    {
        return $this->message->getAttributes();
    }
}