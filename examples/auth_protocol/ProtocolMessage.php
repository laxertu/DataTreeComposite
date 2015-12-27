<?php
namespace MessageComposite\examples\auth_protocol;
use MessageComposite\Formatter\Formatter;
use MessageComposite\Message;
use MessageComposite\MessageDecoratorBase;

/**
 * An example of use of Message class to implement an auth based protocol.
 *
 * All calls needs an Auth node for credentials. This one is a decorator that permits setting it
 *
 * Class ProtocolMessage
 * @package MessageComposite\examples\auth_protocol
 */
class ProtocolMessage extends MessageDecoratorBase
{

    /** @var  AuthNode */
    private $authNode;

    public function __construct(Credentials $credentials, Message $message)
    {
        parent::__construct($message);
        $this->authNode = new AuthNode($credentials->getUsr(), $credentials->getPwd());
    }

    public function getBody(Formatter $formatter)
    {
        return $formatter->buildContent($this->authNode).$this->message->getBody($formatter);
    }

}