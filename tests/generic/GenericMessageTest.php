<?php
namespace MessageComposite\tests;
use MessageComposite\Formatter\XMLFormatter;
use MessageComposite\GenericMessage;
use MessageComposite\MessageElement;


class GenericMessageTest extends \PHPUnit_Framework_TestCase
{


    public function testRemove()
    {

        $sut = new GenericMessage();

        $contentBefore = $sut->getContent(new XMLFormatter());

        $sut->setElement(new MessageElement('a', 'b'), 0);
        $sut->removeElement(0);

        $contentAfter = $sut->getContent(new XMLFormatter());

        $this->assertEquals($contentBefore, $contentAfter);

    }

} 