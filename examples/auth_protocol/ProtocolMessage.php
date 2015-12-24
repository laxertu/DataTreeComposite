<?php
namespace MessageComposite\examples\auth_protocol;


use MessageComposite\GenericMessage;
use MessageComposite\examples\auth_protocol\ApiMethodBase;
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

    public final function __construct(Credentials $credentials, ApiMethodBase $message)
    {
        $this->authNode = new AuthNode($credentials->getUsr(), $credentials->getPwd());
        $this->message = $message;
    }


    public function getContent()
    {

        $this->message->setAuthNode($this->authNode);
        $message = new MessageElement($this->message->getName(), $this->message->getBody()->getValue());

        return $message->getContent();

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