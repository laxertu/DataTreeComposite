<?php
namespace laxertu\DataTree\tests;

use laxertu\DataTree\DataTreeList;
use laxertu\DataTree\Processor\JsonFormatter;
use laxertu\DataTree\DataTreeElement;

class JsonFormatterTest extends \PHPUnit_Framework_TestCase
{
    /** @var  JsonFormatter */
    private $sut;

    public function setUp()
    {
        $this->sut = new JsonFormatter();
    }

    public function testElement()
    {
        $el = new DataTreeElement('a', 'b');
        $sut = $this->sut;
        $obtained = $sut->buildContent($el);

        $this->assertEquals('{"a":"b"}', $obtained);
    }

    public function testNumericElement()
    {
        $el = new DataTreeElement('a', 2);
        $sut = $this->sut;
        $obtained = $sut->buildContent($el);

        $this->assertEquals('{"a":2}', $obtained);
    }


    public function testNullValue()
    {
        $el = new DataTreeElement('a', null);
        $sut = $this->sut;
        $obtained = $sut->buildContent($el);

        $this->assertEquals('{"a":null}', $obtained);

    }


    public function testNestedElements()
    {
        $msg = new GenericMessage('pack');
        $child1 = new DataTreeElement('width', '2');
        $child2 = new DataTreeElement('height', '3');

        $msg->setChild($child1, 0);
        $msg->setChild($child2, 1);

        $sut = $this->sut;
        $obtained = $sut->buildContent($msg);

        $parsed = json_decode($obtained);
        $this->assertEquals('2', $parsed->pack->width);
    }
    /**
     * Have to be possible declaring an element with Json string as content
     */

    public function testElementContentAsJsonString()
    {

        $el = new DataTreeElement('pack', '{"width":"2"}');
        $sut = $this->sut;

        $obtained = $sut->buildContent($el);
        $this->assertJson($obtained);

        $parsed = json_decode($obtained);
        $this->assertEquals('2', $parsed->pack->width);
    }


    public function testListOfElements()
    {
        $sut = $this->sut;
        $list = new DataTreeElement('val', [1]);

        $json = $sut->buildContent($list);
        $this->assertEquals('{"val":[1]}', $json);

        $list = new DataTreeElement('val', [1, 2]);
        $json = $sut->buildContent($list);
        $this->assertEquals('{"val":[1,2]}', $json);

        $list = new DataTreeElement('val', ['a']);
        $json = $sut->buildContent($list);
        $this->assertEquals('{"val":["a"]}', $json);

    }

    public function testChildrenSameName()
    {

        $root = new DataTreeList();
        $root->setName('root');
        $el1 = new DataTreeElement('a', 'b');
        $el2 = new DataTreeElement('a', 'b');

        $root->addTree($el1);
        $root->addTree($el2);

        $expected = '{"root":[{"a":"b"},{"a":"b"}]}';
        $obitained = $this->sut->buildContent($root);


        $this->assertEquals($expected, $obitained);

    }

}
