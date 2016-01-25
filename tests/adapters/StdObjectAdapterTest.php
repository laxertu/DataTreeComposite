<?php
namespace MessageComposite\tests\adapters;


use MessageComposite\Adapter\StdObjectAdapter;
use MessageComposite\GenericMessage;
use MessageComposite\MessageElement;

class StdObjectAdapterTest extends \PHPUnit_Framework_TestCase
{

    /** @var  StdObjectAdapter */
    private $sut;


    public function setUp()
    {
        $this->sut = new StdObjectAdapter();
    }


    public function testSimple()
    {
        $el = new MessageElement('a', 'b');
        $obtained = $this->sut->toStdObject($el);

        $this->assertEquals('b', $obtained->a);
    }

    public function testArray()
    {
        $el = new MessageElement('a', ['b']);
        $obtained = $this->sut->toStdObject($el);

        $this->assertEquals('b', $obtained->a[0]);
    }

    public function testComposite()
    {
        $generic = new GenericMessage('a');
        $el = new MessageElement('b', 'c');
        $generic->setElement($el, 0);

        $obtained = $this->sut->toStdObject($generic);

        $this->assertInstanceOf('StdClass', $obtained);
        $this->assertEquals('c', $obtained->a->b);

    }

    public function testComposite2()
    {
        $generic = new GenericMessage('a');

        $generic->setElement(new MessageElement('b', 'c'), 0);
        $generic->setElement(new MessageElement('d', 'e'), 1);

        $obtained = $this->sut->toStdObject($generic);
        $this->assertInstanceOf('StdClass', $obtained);
        $this->assertEquals('c', $obtained->a->b);

    }


}
