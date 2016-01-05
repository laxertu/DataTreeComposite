<?php
namespace MessageComposite\tests;


use MessageComposite\Formatter\JsonFormatter;
use MessageComposite\GenericMessage;
use MessageComposite\MessageElement;

class JsonFormatterTest extends \PHPUnit_Framework_TestCase
{

    public function testElement()
    {
        $el = new MessageElement('a', 'b');
        $sut = new JsonFormatter();
        $obtained = $sut->buildContent($el);

        #obtained is a valid json string
        $this->assertFalse(is_null(json_decode($obtained)));
        $this->assertEquals('{"a":"b"}', $obtained);
    }

    public function testNestedElements()
    {
        $msg = new GenericMessage('a');
        $child = new MessageElement('b', 'c');

        $msg->setElement($child, 0);
        //$msg->setElement($child, 1);
        $sut = new JsonFormatter();
        $obtained = $sut->buildContent($msg);

        #obtained is a valid json string
        $this->assertFalse(is_null(json_decode($obtained)));
    }

} 