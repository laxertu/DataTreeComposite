<?php
namespace MessageComposite\tests\formatters;


use MessageComposite\Formatter\XMLFormatter;
use \MessageComposite\MessageElement;


class XMLFormatterTest extends \PHPUnit_Framework_TestCase
{


    public function testOne()
    {
        $el = new MessageElement('a', 'b');
        $expected = '<a>b</a>';

        $sut = new XMLFormatter();

        $this->assertEquals($expected, $el->getContent($sut));
    }

    public function testBodyLessMessage()
    {
        $el = new MessageElement('a');
        $sut = new XMLFormatter();

        $this->assertEquals('<a />', $el->getContent($sut));
    }

} 