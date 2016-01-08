<?php
namespace MessageComposite\tests\examples;


use MessageComposite\examples\auth_based_protocol\Credentials;
use MessageComposite\examples\auth_based_protocol\ProtocolMessage;
use MessageComposite\Formatter\XMLFormatter;
use MessageComposite\GenericMessage;
use MessageComposite\tests\utils\XMLCollector;

class AuthBasedProtocolTest extends \PHPUnit_Framework_TestCase
{


    public function testSimple()
    {
        $gm = new GenericMessage('Head');
        $sut = new ProtocolMessage(new Credentials(), $gm);
        $formatter = new XMLFormatter();
        $xml = $formatter->buildContent($sut);

        $this->assertEquals('<Head><Auth><Usr>USR</Usr><Pwd>PWD</Pwd></Auth></Head>', $xml);
    }

} 