<?php
namespace DataTree\tests\examples;

use DataTree\examples\GeoJSON\Position;

class PositionTest extends \PHPUnit_Framework_TestCase
{

    public function testNoArguments()
    {
        $this->setExpectedException('InvalidArgumentException');
        $sut = new Position();
    }

    public function testOneArgument()
    {
        $this->setExpectedException('InvalidArgumentException');
        $sut = new Position([1]);
    }

    public function testNoNumericArgs()
    {
        $this->setExpectedException('InvalidArgumentException');
        $sut = new Position([1, 'a']);

    }

    public function testOk()
    {
        $sut = new Position([1, 2]);

    }
}
