<?php
namespace MessageComposite\tests\formatters;

use MessageComposite\Formatter\JsonFormatter;
use MessageComposite\GenericMessage;
use MessageComposite\MessageElement;
use MessageComposite\MessageListOfValues;

class JsonFormatterTest extends \PHPUnit_Framework_TestCase
{

    public function testElement()
    {
        $el = new MessageElement('a', 'b');
        $sut = new JsonFormatter();
        $obtained = $sut->buildContent($el);

        $this->assertEquals('{"a":"b"}', $obtained);
    }

    public function testNumericElement()
    {
        $el = new MessageElement('a', 2);
        $sut = new JsonFormatter();
        $obtained = $sut->buildContent($el);

        $this->assertEquals('{"a":2}', $obtained);
    }

    public function testNestedElements()
    {
        $msg = new GenericMessage('pack');
        $child1 = new MessageElement('width', '2');
        $child2 = new MessageElement('height', '3');

        $msg->setElement($child1, 0);
        $msg->setElement($child2, 1);

        $sut = new JsonFormatter();
        $obtained = $sut->buildContent($msg);

        $parsed = json_decode($obtained);
        $this->assertEquals('2', $parsed->pack->width);
    }

    /**
     * Have to be possible declaring an element with Json string as content
     */
    public function testElementContentAsJsonString()
    {

        $el = new MessageElement('pack', '{"width":"2"}');
        $sut = new JsonFormatter();

        $obtained = $sut->buildContent($el);
        $this->assertJson($obtained);

        $parsed = json_decode($obtained);
        $this->assertEquals('2', $parsed->pack->width);
    }


    public function testListOfElements()
    {
        $list = new MessageListOfValues('val');
        $sut = new JsonFormatter();

        $list->setValues([1]);
        $xml = $sut->buildContent($list);
        $this->assertEquals('{"val":1}', $xml);
        /*
        $list->setValues([1, 2]);
        $xml = $sut->buildContent($list);
        $this->assertEquals('{"val":[1,2]}', $xml);

        $message = new GenericMessage('ListOfVals');
        $message->setElement($list, 0);

        $xml = $sut->buildContent($message);
        $this->assertEquals('{"ListOfVals":["val":1,"val":2]}', $xml);
        */

    }


} 