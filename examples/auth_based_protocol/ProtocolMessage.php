<?php
namespace DataTree\examples\auth_based_protocol;

use DataTree\Formatter\xml\XMLFormattableInterface;
use DataTree\xml\GenericMessage;
use DataTree\xml\MessageDecoratorBase;
use DataTree\xml\MessageElement;


/**
 * Example usage of Decorator for implementation of a generic authentication based protocol.
 * Here every message have an Auth node as first one
 *
 * Class ProtocolMessage
 * @package DataTree\examples\auth_based_protocol
 * @see DataTree\tests\examples\AuthBasedProtocolTest
 */
class ProtocolMessage extends MessageDecoratorBase
{

    /** @var  Credentials */
    private $credentials;

    public function __construct(Credentials $credentials, XMLFormattableInterface $messageInterface)
    {
        $this->credentials = $credentials;
        $this->message = $messageInterface;
    }


    public function getChildren()
    {

        $authNode = new GenericMessage('Auth');
        $authNode->setChild(new MessageElement('Usr', $this->credentials->getUsr()), 0);
        $authNode->setChild(new MessageElement('Pwd', $this->credentials->getPwd()), 1);

        $chidren = $this->message->getChildren();
        $authNode->setParent($this->message);
        array_unshift($chidren, $authNode);

        return $chidren;
    }
}
