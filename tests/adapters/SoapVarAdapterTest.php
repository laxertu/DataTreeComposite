<?php
namespace laxertu\DataTree\tests\adapters;
use laxertu\DataTree\Processor\xml\SoapVarAdapter;
use laxertu\DataTree\xml\GenericMessage;
use laxertu\DataTree\xml\MessageElement;


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

    public function testNull()
    {
        $el = new MessageElement('a', null);
        $obtained = $this->sut->toSoapVar($el);

        $this->assertTrue(is_null($obtained->enc_value->a));

    }


}
