<?php
namespace MessageComposite\tests;
include('BaseTest.php');


use MessageComposite\Formatter\XMLFormatter;
use \MessageComposite\MessageElement;


class XMLFormatterTest extends BaseTest
{


    public function testOne()
    {

        $el = new MessageElement('a', 'b');
        $expected = '<a>b</a>';

        $sut = new XMLFormatter();

        $this->assertEquals($expected, $sut->buildContent($el));


    }

} 