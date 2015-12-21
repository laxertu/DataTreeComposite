<?php
namespace MessageComposite\tests;
include('BaseTest.php');


use \MessageComposite\MessageElement;


class XMLFormatterTest extends BaseTest
{


    public function testOne()
    {

        $sut = new MessageElement('a', 'b');
        $expected = '<a>b</a>';

        $this->assertEquals($expected, $sut->getContent());


    }

} 