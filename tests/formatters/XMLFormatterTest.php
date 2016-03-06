<?php
namespace laxertu\DataTree\tests\formatters;

use laxertu\DataTree\Processor\xml\XMLFormatter;
use laxertu\DataTree\xml\GenericMessage;
use laxertu\DataTree\xml\MessageElement;

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
        $list = new MessageElement('val', [1]);
        $sut = new XMLFormatter();

        $xml = $sut->buildContent($list);
        $this->assertEquals('<val>1</val>', $xml);

        $list = new MessageElement('val', [1, 2]);
        $xml = $sut->buildContent($list);
        $this->assertEquals('<val>1</val><val>2</val>', $xml);

        $message = new GenericMessage('ListOfVals');
        $message->setChild($list, 0);

        $xml = $sut->buildContent($message);
        $this->assertEquals('<ListOfVals><val>1</val><val>2</val></ListOfVals>', $xml);

        $param = new MessageElement('param', 'param1');
        $message->setChild($param, 1);
        $xml = $sut->buildContent($message);
        $this->assertEquals('<ListOfVals><val>1</val><val>2</val><param>param1</param></ListOfVals>', $xml);
    }

    public function testZero()
    {
        $el = new MessageElement('a', 0);
        $sut = new XMLFormatter();

        $xml = $sut->buildContent($el);
        $this->assertEquals('<a>0</a>', $xml);

    }
}
