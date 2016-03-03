<?php
namespace DataTree\tests\examples;

use DataTree\examples\auth_based_protocol\Credentials;
use DataTree\examples\auth_based_protocol\ProtocolMessage;
use DataTree\Processor\json\JsonFormatter;
use DataTree\Processor\xml\XMLFormatter;
use DataTree\xml\GenericMessage;

class AuthBasedProtocolTest extends \PHPUnit_Framework_TestCase
{

    public function testSimple()
    {
        $formatter = new XMLFormatter();
        $gm = new GenericMessage('Head');

        $otherNode = new GenericMessage('other');
        $gm->setChild($otherNode, 0);


        $sut = new ProtocolMessage(new Credentials(), $gm);

        $xml = $formatter->buildContent($sut);
        $this->assertEquals('<Head><Auth><Usr>USR</Usr><Pwd>PWD</Pwd></Auth><other /></Head>', $xml);

        $formatter = new JsonFormatter();
        $json = $formatter->buildContent($sut);

        $this->assertEquals('{"Head":{"Auth":{"Usr":"USR","Pwd":"PWD"},"other":{}}}', $json);

    }
}
