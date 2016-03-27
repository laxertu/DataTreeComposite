<?php
namespace laxertu\DataTree\tests\adapters;
use laxertu\DataTree\Processor\xml\SoapVarAdapter;
use laxertu\DataTree\tests\generic\GenericMessage;
use laxertu\DataTree\xml\NodeElement;


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
        $el = new NodeElement('a', 'b');
        $obtained = $this->sut->toSoapVar($el);


        $this->assertEquals('b', $obtained->enc_value->a);
    }

    public function testNull()
    {
        $el = new NodeElement('a', null);
        $obtained = $this->sut->toSoapVar($el);

        $this->assertTrue(is_null($obtained->enc_value->a));

    }


}
