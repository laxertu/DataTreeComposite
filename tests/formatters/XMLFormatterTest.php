<?php
namespace MessageComposite\tests\formatters;


use MessageComposite\Formatter\XMLFormatter;
use MessageComposite\GenericMessage;
use \MessageComposite\MessageElement;
use \MessageComposite\MessageListOfValues;


class XMLFormatterTest extends \PHPUnit_Framework_TestCase
{


    public function testOne()
    {
        $el = new MessageElement('a', 'b');
        $expected = '<a>b</a>';

        $sut = new XMLFormatter();

        $this->assertEquals($expected, $sut->buildContent($el));
    }

    public function testBodyLessMessage()
    {
        $el = new MessageElement('a');

        $sut = new XMLFormatter();
        $this->assertEquals('<a />', $sut->buildContent($el));
    }


    public function testListOfElements()
    {
        $list = new MessageListOfValues('val');
        $sut = new XMLFormatter();

        $list->setValues([1]);
        $xml = $sut->buildContent($list);
        $this->assertEquals('<val>1</val>', $xml);

        $list->setValues([1, 2]);
        $xml = $sut->buildContent($list);
        $this->assertEquals('<val>1</val><val>2</val>', $xml);

        $message = new GenericMessage('ListOfVals');
        $message->setElement($list, 0);

        $xml = $sut->buildContent($message);
        $this->assertEquals('<ListOfVals><val>1</val><val>2</val></ListOfVals>', $xml);

        $param = new MessageElement('param', 'param1');
        $message->setElement($param, 1);
        $xml = $sut->buildContent($message);
        $this->assertEquals('<ListOfVals><val>1</val><val>2</val><param>param1</param></ListOfVals>', $xml);
    }

} 