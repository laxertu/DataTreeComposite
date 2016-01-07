<?php
namespace MessageComposite\tests\formatters;

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
        $msg = new GenericMessage('widget');
        $child1 = new MessageElement('width', '2');
        $child2 = new MessageElement('height', '3');

        $msg->setElement($child1, 0);
        $msg->setElement($child2, 1);

        $sut = new JsonFormatter();
        $obtained = $sut->buildContent($msg);

        #obtained is a valid json string
        $this->assertFalse(is_null(json_decode($obtained)));
    }

} 