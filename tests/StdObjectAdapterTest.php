<?php
namespace laxertu\DataTree\tests\adapters;


use laxertu\DataTree\Processor\StdObjectAdapter;
use laxertu\DataTree\tests\GenericMessage;

use laxertu\DataTree\DataTreeList;
use laxertu\DataTree\DataTreeElement;

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
        $el = new DataTreeElement('a', 'b');
        $obtained = $this->sut->toStdObject($el);

        $this->assertEquals('b', $obtained->a);
    }


    public function testNull()
    {
        $el = new DataTreeElement('a', null);
        $obtained = $this->sut->toStdObject($el);

        $this->assertTrue(is_null($obtained->a));

    }

    public function testArray()
    {
        $el = new DataTreeElement('a', ['b']);
        $obtained = $this->sut->toStdObject($el);

        $this->assertEquals('b', $obtained->a[0]);
    }

    public function testComposite()
    {
        $generic = new GenericMessage('a');
        $el = new DataTreeElement('b', 'c');
        $generic->setChild($el, 0);

        $obtained = $this->sut->toStdObject($generic);

        $this->assertInstanceOf('StdClass', $obtained);
        $this->assertEquals('c', $obtained->a->b);

    }

    public function testListOfValues()
    {

        $generic = new GenericMessage('a');

        $generic->setChild(new DataTreeElement('b', 'c1'), 0);
        $generic->setChild(new DataTreeElement('b', 'c2'), 1);

        $obtained = $this->sut->toStdObject($generic);

        $this->assertEquals(serialize(['c1', 'c2']), serialize($obtained->a->b));
    }


    public function testComposite2()
    {
        $generic = new GenericMessage('a');

        $generic->setChild(new DataTreeElement('b', 'c'), 0);
        $generic->setChild(new DataTreeElement('d', 'e'), 1);
        $generic->setChild(new DataTreeElement('b', 'f'), 2);

        $obtained = $this->sut->toStdObject($generic);

        $this->assertInstanceOf('StdClass', $obtained);
        $this->assertEquals('e', $obtained->a->d);
        $this->assertEquals(serialize(['c', 'f']), serialize($obtained->a->b));

    }


    public function testListFoTrees()
    {

        $list = new DataTreeList('list');
        $list->addTree(new DataTreeElement('a', 'b'));
        $obtained = $this->sut->toStdObject($list);

        $this->assertEquals('b', $obtained->list[0]->a);


        $list->addTree(new DataTreeElement('a', 'b'));
        $obtained = $this->sut->toStdObject($list);

        $this->assertEquals('b', $obtained->list[1]->a);

    }

}
