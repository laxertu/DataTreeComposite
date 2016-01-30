<?php
namespace MessageComposite\tests\adapters;


use MessageComposite\Adapter\ArrayAdapter;
use MessageComposite\xml\GenericMessage;
use MessageComposite\xml\MessageElement;

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

    }


}
