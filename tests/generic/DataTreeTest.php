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

    public function testSetChild()
    {
        # first add test
        $this->sut->setChildTree('a', new DataTreeElement('b', 'c'));
        $children = $this->sut->getChildren();
        $firstChild = $children[0];

        $this->assertEquals('c', $firstChild->getValue());

        # overwrite test
        $this->sut->setChildTree('a', new DataTreeElement('b', 'd'));
        $children = $this->sut->getChildren();
        $firstChild = $children[0];
        $this->assertEquals('d', $firstChild->getValue());

    }

}
