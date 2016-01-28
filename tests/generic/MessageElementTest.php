<?php
namespace MessageComposite\tests;

use MessageComposite\xml\MessageElement;

class MessageElementTest extends \PHPUnit_Framework_TestCase
{

    public function testNullValue()
    {
        $sut = new MessageElement('a', null);
        $this->assertTrue($sut->getValue() === '');
    }
}
