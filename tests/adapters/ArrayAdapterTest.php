<?php
namespace laxertu\DataTree\tests\adapters;


use laxertu\DataTree\Processor\xml\ArrayAdapter;
use laxertu\DataTree\tests\generic\GenericMessage;
use laxertu\DataTree\xml\MessageElement;

class ArrayAdapterTest extends \PHPUnit_Framework_TestCase
{

    /** @var  ArrayAdapter */
    private $sut;


    public function setUp()
    {
        $this->sut = new ArrayAdapter();
    }


    public function testSimple()
    {
        $el = new MessageElement('a', 'b');
        $obtained = $this->sut->toArray($el);

        $this->assertEquals('b', $obtained['a']);
    }

    public function testNull()
    {
        $el = new MessageElement('a', null);
        $obtained = $this->sut->toArray($el);

        $this->assertTrue(is_null($obtained['a']));

    }

    public function testArray()
    {
        $el = new MessageElement('a', ['b']);
        $obtained = $this->sut->toArray($el);

        $this->assertEquals('b', $obtained['a'][0]);
    }

    public function testComposite()
    {
        $generic = new GenericMessage('a');
        $el = new MessageElement('b', 'c');
        $generic->setChild($el, 0);

        $obtained = $this->sut->toArray($generic);

        $this->assertEquals('c', $obtained['a']['b']);

    }

    public function testComposite2()
    {
        $generic = new GenericMessage('a');

        $generic->setChild(new MessageElement('b', 'c'), 0);
        $generic->setChild(new MessageElement('d', 'e'), 1);

        $obtained = $this->sut->toArray($generic);

        $this->assertEquals('c', $obtained['a']['b']);
        $this->assertEquals('e', $obtained['a']['d']);

    }

    public function testListOfValues()
    {

        $generic = new GenericMessage('a');

        $generic->setChild(new MessageElement('b', 'c1'), 0);
        $generic->setChild(new MessageElement('b', 'c2'), 1);

        $obtained = $this->sut->toArray($generic);

        $expected = [

            'a' => ['b' => ['c1', 'c2']]
        ];

        $this->assertEquals(serialize($expected), serialize($obtained));

    }


}
