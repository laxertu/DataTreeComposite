<?php
namespace DataTree\tests\examples;

use DataTree\examples\GeoJSON\GeoJSONObject;
use DataTree\examples\GeoJSON\Point;
use DataTree\Formatter\json\JsonFormatter;

class GeoJSONPointTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $sut = new Point();
        $sut->setCoordinates([123, 456]);
        $formatter = new JsonFormatter();
        $obtained = json_decode($formatter->buildContent($sut));

        $this->assertEquals(123, $obtained->GeoJsonObject->coordinates[0]);
    }
}
