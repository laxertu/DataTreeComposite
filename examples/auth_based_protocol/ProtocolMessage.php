<?php
namespace DataTree\examples\auth_based_protocol;

use DataTree\Processor\xml\XMLFormattableInterface;
use DataTree\xml\GenericMessage;
use DataTree\xml\XMLFormattableDecoratorBase;
use DataTree\xml\MessageElement;


/**
 * Example usage of Decorator for implementation of a generic authentication based protocol.
 * Here every message have an Auth node as first one
 *
 * Class ProtocolMessage
 * @package DataTree\examples\auth_based_protocol
 * @see DataTree\tests\examples\AuthBasedProtocolTest
 */
class ProtocolMessage extends XMLFormattableDecoratorBase
{

    /** @var  Credentials */
    private $credentials;

    public function __construct(Credentials $credentials, XMLFormattableInterface $messageInterface)
    {
        $this->credentials = $credentials;
        $this->setXMLFormattable($messageInterface);
    }


    public function getChildren()
    {

        $authNode = new GenericMessage('Auth');
        $authNode->setChild(new MessageElement('Usr', $this->credentials->getUsr()), 0);
        $authNode->setChild(new MessageElement('Pwd', $this->credentials->getPwd()), 1);

        $xml = $this->getXMLFormattable();
        $children = $xml->getChildren();
        $authNode->setParent($xml);
        array_unshift($children, $authNode);

        return $children;
    }
}
