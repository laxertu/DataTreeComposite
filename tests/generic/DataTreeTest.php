<?php
namespace laxertu\DataTree\tests\generic;

use laxertu\DataTree\DataTree;
use laxertu\DataTree\DataTreeElement;


class DataTreeTest extends \PHPUnit_Framework_TestCase
{

    /** @var DataTree sut */
    private $sut;

    public function setUp()
    {
        $this->sut = new DataTree();
    }

    public function testSetChildElement()
    {
        # first add test
        $this->sut->setChildElement('b', 'c');
        $children = $this->sut->getChildren();
        $firstChild = $children[0];

        $this->assertEquals('c', $firstChild->getValue());

        # overwrite test
        $this->sut->setChildElement('b', 'd');
        $children = $this->sut->getChildren();
        $firstChild = $children[0];
        $this->assertEquals('d', $firstChild->getValue());

    }

    public function testAddChildAndRemove()
    {
        $this->sut->addChildTree(new DataTreeElement('a', 'a1'));
        $this->sut->addChildTree(new DataTreeElement('b', 'b1'));
        $this->sut->addChildTree(new DataTreeElement('c', 'c1'));
        $this->sut->removeChildTree('b');

        $obtained = [];
        foreach ($this->sut->getChildren() as $k => $child) {
            $obtained[$k]=$child->getName();
        }

        $expected = [
            0 => 'a',
            2 => 'c'
        ];

        $this->assertEquals(serialize($expected), serialize($obtained));

        # add with existent name
        $this->sut->addChildTree(new DataTreeElement('a', 'a2'));
        $obtained = [];

        $children = $this->sut->getChildren();
        foreach ($children as $k => $child) {
            $obtained[$k]=$child->getName();
        }

        $expected = [
            0 => 'a',
            2 => 'c'
        ];

        $this->assertEquals(serialize($expected), serialize($obtained));
        $this->assertEquals('a2', $children[0]->getValue());


    }

}
