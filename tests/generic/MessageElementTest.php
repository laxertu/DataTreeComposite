<?php
namespace MessageComposite\tests;

use MessageComposite\MessageElement;

class MessageElementTest extends \PHPUnit_Framework_TestCase
{

    public function testNullValue()
    {
        $sut = new MessageElement('a', null);
        $this->assertTrue($sut->getValue() === '');
    }
}
