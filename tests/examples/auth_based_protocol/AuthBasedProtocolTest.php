<?php
namespace MessageComposite\tests\examples;

use MessageComposite\examples\auth_based_protocol\Credentials;
use MessageComposite\examples\auth_based_protocol\ProtocolMessage;
use MessageComposite\Formatter\json\JsonFormatter;
use MessageComposite\Formatter\xml\XMLFormatter;
use MessageComposite\xml\GenericMessage;

class AuthBasedProtocolTest extends \PHPUnit_Framework_TestCase
{

    public function testSimple()
    {
        $formatter = new XMLFormatter();
        $gm = new GenericMessage('Head');

        $otherNode = new GenericMessage('other');
        $gm->setElement($otherNode, 0);


        $sut = new ProtocolMessage(new Credentials(), $gm);

        $xml = $formatter->buildContent($sut);
        $this->assertEquals('<Head><Auth><Usr>USR</Usr><Pwd>PWD</Pwd></Auth><other /></Head>', $xml);

        $formatter = new JsonFormatter();
        $json = $formatter->buildContent($sut);

        $this->assertEquals('{"Head":{"Auth":{"Usr":"USR","Pwd":"PWD"},"other":{}}}', $json);

    }
}
