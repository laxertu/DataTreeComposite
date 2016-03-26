<?php
namespace laxertu\DataTree\tests\formatters;

use laxertu\DataTree\Processor\xml\XMLFormatter;
use laxertu\DataTree\xml\GenericMessage;
use laxertu\DataTree\xml\MessageElement;
use laxertu\DataTree\xml\NodeList;

class XMLFormatterTest extends \PHPUnit_Framework_TestCase
{
    /** @var  XMLFormatter */
    private $sut;

    public function setUp()
    {
        $this->sut = new XMLFormatter();
    }

    public function testOne()
    {
        $el = new MessageElement('a', 'b');
        $expected = '<a>b</a>';

        $this->assertEquals($expected, $this->sut->buildContent($el));
    }


    public function testProlog()
    {
        $el = new MessageElement('a', 'b');
        $expected = '<a>b</a>';

        $splittedXML = explode("\n", $this->sut->buildMessageWithProlog($el));

        $this->assertEquals('<?xml version="1.0" encoding="UTF-8"?>', $splittedXML[0]);
        $this->assertEquals('<a>b</a>', $splittedXML[1]);
    }


    public function testNull()
    {
        $el = new MessageElement('a', null);
        $expected = '<a />';


        $this->assertEquals($expected, $this->sut->buildContent($el));
    }

    public function testBodyLessMessage()
    {
        $el = new MessageElement('a');

        $this->assertEquals('<a />', $this->sut->buildContent($el));
    }


    public function testListOfElements()
    {
        $list = new MessageElement('val', [1]);
        $sut = $this->sut;

        $xml = $sut->buildContent($list);
        $this->assertEquals('<val>1</val>', $xml);

        $list = new MessageElement('val', [1, 2]);
        $xml = $sut->buildContent($list);
        $this->assertEquals('<val>1</val><val>2</val>', $xml);

        $nodeList = new NodeList();
        $nodeList->setName('list');
        $nodeList->addTree(new MessageElement('val', '1'));
        $nodeList->addTree(new MessageElement('val', '2'));
        $xml = $sut->buildContent($nodeList);
        $this->assertEquals('<list><val>1</val><val>2</val></list>', $xml);

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

        $xml = $this->sut->buildContent($el);
        $this->assertEquals('<a>0</a>', $xml);

    }
}
