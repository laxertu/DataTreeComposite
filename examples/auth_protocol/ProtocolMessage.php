<?php
namespace MessageComposite\examples\auth_protocol;
use MessageComposite\Formatter\Formatter;
use MessageComposite\Message;
use MessageComposite\MessageElement;
use MessageComposite\MessageInterface;

/**
 * An example of use of Message class to implement an auth based protocol.
 *
 * All calls needs an Auth node for credentials. This one is a decorator that permits setting it
 *
 * Class ProtocolMessage
 * @package MessageComposite\examples\auth_protocol
 */
class ProtocolMessage implements MessageInterface
{
    /** @var  Message */
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

        $content = $this->authNode->getContent($formatter).$this->message->getBody($formatter);
        $message = new MessageElement($this->message->getName(), $content);

        return $message->getContent($formatter);

    }


    public function getName()
    {
        return $this->message->getName();
    }

    public function getAttributes()
    {
        return $this->message->getAttributes();
    }

    /** Sets message name */
    public function setName($name)
    {
        return $this->message->setName($name);
    }

    public function setAttributes($attributes)
    {
        return $this->message->setAttributes($attributes);
    }

    /**
     * Returns message plain text content (without head and foot)
     *
     * @return String
     */
    public function getBody(Formatter $formatter)
    {
        return $this->message->getBody($formatter);
    }


}