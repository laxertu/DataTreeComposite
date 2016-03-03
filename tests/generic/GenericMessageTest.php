<?php
namespace DataTree\tests;

use DataTree\Processor\xml\XMLFormatter;
use DataTree\xml\GenericMessage;
use DataTree\xml\MessageElement;
use DataTree\tests\utils\XMLCollector;

class GenericMessageTest extends \PHPUnit_Framework_TestCase
{
    public function testRemove()
    {
        $sut = new GenericMessage('a');

        $formatter = new XMLFormatter();
        $contentBefore = $formatter->buildContent($sut);

        $child = new MessageElement('b', 'c');
        $sut->setChild($child, 0);
        $sut->removeChild(0);

        $contentAfter = $formatter->buildContent($sut);

        $this->assertEquals($contentBefore, $contentAfter);
    }


    public function testsetChild()
    {
        $collector = new XMLCollector();

        $sut = new GenericMessage('a');

        $child = new MessageElement('b', 'c');
        $sut->setChild($child, 0);
        $sut->setChild($child, 1);

        $formatter = new XMLFormatter();
        $xml = $formatter->buildContent($sut);

        $this->assertEquals(1, $collector->getNumNodeOccurrences($xml, $sut));
        $this->assertEquals(2, $collector->getNumNodeOccurrences($xml, $child));

    }

    public function testBuildPath()
    {

        $sut = new GenericMessage('a');
        $this->assertEquals('/a', $sut->getPathWithSeparator('/'));

        $child = new MessageElement('b', 'c');
        $sut->setChild($child, 0);

        $this->assertEquals('-a-b', $child->getPathWithSeparator('-'));

    }
}
