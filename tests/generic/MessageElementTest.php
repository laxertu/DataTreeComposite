<?php
namespace laxertu\DataTree\tests;

use laxertu\DataTree\xml\NodeElement;

class MessageElementTest extends \PHPUnit_Framework_TestCase
{

    public function testNullValue()
    {
        $sut = new NodeElement('a', null);
        $this->assertTrue(is_null($sut->getValue()));
    }
}
