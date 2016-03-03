<?php
namespace DataTree\tests\adapters;
use DataTree\Processor\xml\SoapVarAdapter;
use DataTree\xml\GenericMessage;
use DataTree\xml\MessageElement;


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
