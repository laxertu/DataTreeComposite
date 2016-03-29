<?php
namespace laxertu\DataTree\tests\formatters;

use laxertu\DataTree\Processor\xml\XMLFormatter;
use laxertu\DataTree\tests\generic\GenericMessage;
use laxertu\DataTree\xml\Message;
use laxertu\DataTree\xml\NodeElement;
use laxertu\DataTree\xml\NodeList;
use laxertu\DataTree\xml\Node;

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
        $el = new NodeElement('a', 'b');
        $expected = '<a>b</a>';

        $this->assertEquals($expected, $this->sut->buildContent($el));
    }


    public function testProlog()
    {
        $el = new NodeElement('a', 'b');
        $expected = '<a>b</a>';

        $splittedXML = explode("\n", $this->sut->buildMessageWithProlog($el));

        $this->assertEquals('<?xml version="1.0" encoding="UTF-8"?>', $splittedXML[0]);
        $this->assertEquals('<a>b</a>', $splittedXML[1]);
    }

    public function testPrologNode()
    {
        $el = new Message();
        $el->setName('a');
        $el->setValue('b');

        $expected = '<a>b</a>';

        $splittedXML = explode("\n", $this->sut->buildMessageWithProlog($el));

        $this->assertEquals('<?xml version="1.0" encoding="UTF-8"?>', $splittedXML[0]);
        $this->assertEquals('<a>b</a>', $splittedXML[1]);

    }


    public function testNull()
    {
        $el = new NodeElement('a', null);
        $expected = '<a />';


        $this->assertEquals($expected, $this->sut->buildContent($el));
    }

    public function testBodyLessMessage()
    {
        $el = new NodeElement('a');

        $this->assertEquals('<a />', $this->sut->buildContent($el));
    }


    public function testListOfElements()
    {
        $list = new NodeElement('val', [1]);
        $sut = $this->sut;

        $xml = $sut->buildContent($list);
        $this->assertEquals('<val>1</val>', $xml);

        $list = new NodeElement('val', [1, 2]);
        $xml = $sut->buildContent($list);
        $this->assertEquals('<val>1</val><val>2</val>', $xml);

        $nodeList = new NodeList();
        $nodeList->setName('list');
        $nodeList->addNode(new NodeElement('val', '1'));
        $nodeList->addNode(new NodeElement('val', '2'));
        $xml = $sut->buildContent($nodeList);
        $this->assertEquals('<list><val>1</val><val>2</val></list>', $xml);

        $message = new GenericMessage('ListOfVals');
        $message->setChild($list, 0);

        $xml = $sut->buildContent($message);
        $this->assertEquals('<ListOfVals><val>1</val><val>2</val></ListOfVals>', $xml);

        $param = new NodeElement('param', 'param1');
        $message->setChild($param, 1);
        $xml = $sut->buildContent($message);
        $this->assertEquals('<ListOfVals><val>1</val><val>2</val><param>param1</param></ListOfVals>', $xml);
    }

    public function testZero()
    {
        $el = new NodeElement('a', 0);

        $xml = $this->sut->buildContent($el);
        $this->assertEquals('<a>0</a>', $xml);

    }
}
