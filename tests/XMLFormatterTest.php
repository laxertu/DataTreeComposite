<?php
namespace MessageComposite\tests;
include('BaseTest.php');


use \MessageComposite\MessageElement;


class XMLFormatterTest extends BaseTest
{


    public function testOne()
    {

        $sut = new MessageElement('a', 'b');
        $expected = 'b';

        $this->assertEquals($expected, $sut->getBody());


    }

} 