<?php
namespace MessageComposite\tests;
use MessageComposite\Formatter\XMLFormatter;
use MessageComposite\GenericMessage;
use MessageComposite\MessageElement;
use MessageComposite\tests\utils\XMLCollector;


class GenericMessageTest extends \PHPUnit_Framework_TestCase
{
    public function testRemove()
    {
        $sut = new GenericMessage('a');

        $contentBefore = $sut->getContent(new XMLFormatter());

        $sut->setElement(new MessageElement('b', 'c'), 0);
        $sut->removeElement(0);

        $contentAfter = $sut->getContent(new XMLFormatter());

        $this->assertEquals($contentBefore, $contentAfter);
    }


    public function testSetElement()
    {
        $collector = new XMLCollector();

        $sut = new GenericMessage('a');

        $child = new MessageElement('b', 'c');
        $sut->setElement($child, 0);
        $sut->setElement($child, 1);

        $xml = $sut->getContent(new XMLFormatter());

        $this->assertEquals(1, $collector->getNumNodeOccurrences($xml, $sut));
        $this->assertEquals(2, $collector->getNumNodeOccurrences($xml, $child));

    }

    public function testBuildPath()
    {

        $sut = new GenericMessage('a');
        $this->assertEquals('/a', $sut->getPathWithSeparator('/'));

        $child = new MessageElement('b', 'c');
        $sut->setElement($child, 0);

        $this->assertEquals('/a/b', $child->getPathWithSeparator('/'));

    }

} 