<?php
namespace laxertu\DataTree\tests\adapters;

use laxertu\DataTree\DataTreeElement;
use laxertu\DataTree\DataTreeList;
use laxertu\DataTree\Processor\ArrayAdapter;
use laxertu\DataTree\tests\GenericMessage;


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
        $el = new DataTreeElement('a', 'b');
        $obtained = $this->sut->toArray($el);

        $this->assertEquals('b', $obtained['a']);
    }

    public function testNull()
    {
        $el = new DataTreeElement('a', null);
        $obtained = $this->sut->toArray($el);

        $this->assertTrue(is_null($obtained['a']));

    }

    public function testArray()
    {
        $el = new DataTreeElement('a', ['b']);
        $obtained = $this->sut->toArray($el);

        $this->assertEquals('b', $obtained['a'][0]);
    }

    public function testComposite()
    {
        $generic = new GenericMessage('a');
        $el = new DataTreeElement('b', 'c');
        $generic->setChild($el, 0);

        $obtained = $this->sut->toArray($generic);

        $this->assertEquals('c', $obtained['a']['b']);

    }

    public function testComposite2()
    {
        $generic = new GenericMessage('a');

        $generic->setChild(new DataTreeElement('b', 'c'), 0);
        $generic->setChild(new DataTreeElement('d', 'e'), 1);

        $obtained = $this->sut->toArray($generic);

        $this->assertEquals('c', $obtained['a']['b']);
        $this->assertEquals('e', $obtained['a']['d']);

    }

    public function testListOfValues()
    {

        $generic = new GenericMessage('a');

        $generic->setChild(new DataTreeElement('b', 'c1'), 0);
        $generic->setChild(new DataTreeElement('b', 'c2'), 1);

        $obtained = $this->sut->toArray($generic);

        $expected = [

            'a' => ['b' => ['c1', 'c2']]
        ];

        $this->assertEquals(serialize($expected), serialize($obtained));

    }

    public function testListFoTrees()
    {

        $list = new DataTreeList('list');
        $list->addTree(new DataTreeElement('a', 'b'));
        $obtained = $this->sut->toArray($list);

        $expected = [
            'list' => [0 => ['a' => 'b']]
        ];
        $this->assertEquals(serialize($expected), serialize($obtained));

        $list->addTree(new DataTreeElement('a', 'b'));
        $obtained = $this->sut->toArray($list);

        $expected = [
            'list' => [
                0 => ['a' => 'b'],
                1 => ['a' => 'b']
            ]
        ];
        $this->assertEquals(serialize($expected), serialize($obtained));


    }


}
