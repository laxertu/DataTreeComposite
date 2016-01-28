<?php
namespace MessageComposite\examples\auth_based_protocol;

use MessageComposite\xml\GenericMessage;
use MessageComposite\xml\MessageDecoratorBase;
use MessageComposite\xml\MessageElement;
use MessageComposite\xml\MessageInterface;

/**
 * Example usage of Decorator for implementation of a generic authentication based protocol.
 * Here every message have an Auth node as first one
 *
 * Class ProtocolMessage
 * @package MessageComposite\examples\auth_based_protocol
 * @see MessageComposite\tests\examples\AuthBasedProtocolTest
 */
class ProtocolMessage extends MessageDecoratorBase
{

    /** @var  Credentials */
    private $credentials;

    public function __construct(Credentials $credentials, MessageInterface $messageInterface)
    {
        $this->credentials = $credentials;
        $this->message = $messageInterface;
    }


    public function getChildren()
    {

        $authNode = new GenericMessage('Auth');
        $authNode->setElement(new MessageElement('Usr', $this->credentials->getUsr()), 0);
        $authNode->setElement(new MessageElement('Pwd', $this->credentials->getPwd()), 1);

        $chidren = $this->message->getChildren();
        $authNode->setParent($this->message);
        array_unshift($chidren, $authNode);

        return $chidren;
    }
}
