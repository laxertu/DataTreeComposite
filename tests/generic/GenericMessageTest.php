<?php
namespace MessageComposite\tests;

use MessageComposite\Formatter\xml\XMLFormatter;
use MessageComposite\xml\GenericMessage;
use MessageComposite\xml\MessageElement;
use MessageComposite\tests\utils\XMLCollector;

class GenericMessageTest extends \PHPUnit_Framework_TestCase
{
    public function testRemove()
    {
        $sut = new GenericMessage('a');

        $formatter = new XMLFormatter();
        $contentBefore = $formatter->buildContent($sut);

        $child = new MessageElement('b', 'c');
        $sut->setElement($child, 0);
        $sut->removeElement(0);

        $contentAfter = $formatter->buildContent($sut);

        $this->assertEquals($contentBefore, $contentAfter);
    }


    public function testSetElement()
    {
        $collector = new XMLCollector();

        $sut = new GenericMessage('a');

        $child = new MessageElement('b', 'c');
        $sut->setElement($child, 0);
        $sut->setElement($child, 1);

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
        $sut->setElement($child, 0);

        $this->assertEquals('-a-b', $child->getPathWithSeparator('-'));

    }
}
