<?php
namespace laxertu\DataTree\tests;

use laxertu\DataTree\xml\MessageElement;

class MessageElementTest extends \PHPUnit_Framework_TestCase
{

    public function testNullValue()
    {
        $sut = new MessageElement('a', null);
        $this->assertTrue($sut->getValue() === '');
    }
}
