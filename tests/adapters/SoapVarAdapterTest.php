<?php
namespace MessageComposite\tests\adapters;
use MessageComposite\Adapter\SoapVarAdapter;
use MessageComposite\GenericMessage;
use MessageComposite\MessageElement;


class SoapVarAdapterTest extends \PHPUnit_Framework_TestCase
{

    /** @var  SoapVarAdapter */
    private $sut;

    public function setUp()
    {
        $this->sut = new SoapVarAdapter();
    }

    public function testSimple()
    {
        $el = new MessageElement('a', 'b');
        $obtained = $this->sut->toSoapVar($el);


        $this->assertEquals('b', $obtained->enc_value->a);
    }


}
