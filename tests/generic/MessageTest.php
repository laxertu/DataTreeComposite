<?php
namespace laxertu\DataTree\tests;

use laxertu\DataTree\Processor\xml\XMLFormatter;
use laxertu\DataTree\xml\Message;
use laxertu\DataTree\xml\Node;
use laxertu\DataTree\xml\NodeElement;
use laxertu\DataTree\tests\utils\XMLCollector;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Node */
    private $sut;

    public function setUp()
    {
        $this->sut = new Message();
    }

    public function testRemove()
    {
        $sut = $this->sut;
        $sut->setName('a');

        $formatter = new XMLFormatter();
        $contentBefore = $formatter->buildContent($sut);

        $child = new NodeElement('b', 'c');
        $sut->setChildTree($child);
        $sut->removeChildTree('b');

        $contentAfter = $formatter->buildContent($sut);

        $this->assertEquals($contentBefore, $contentAfter);
    }

    public function testRemoveInvalidName()
    {
        $this->setExpectedException('InvalidArgumentException');
        $this->sut->removeChildTree('a');
    }

    public function testBuildPath()
    {

        $sut = $this->sut;
        $sut->setName('a');
        $this->assertEquals('/a', $sut->getPathWithSeparator('/'));

        $child = new NodeElement('b', 'c');
        $sut->setChildTree($child);

        $this->assertEquals('-a-b', $child->getPathWithSeparator('-'));

    }
}
