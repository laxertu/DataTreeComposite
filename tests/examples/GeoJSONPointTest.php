<?php
namespace MessageComposite\tests\examples;


use MessageComposite\examples\GeoJSON\GeoJSONObject;
use MessageComposite\examples\GeoJSON\Point;
use MessageComposite\Formatter\JsonFormatter;

class GeoJSONPointTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $sut = new Point('ExamplePoint', [123, 456]);
        $formatter = new JsonFormatter();
        $obtained = json_decode($formatter->buildContent($sut), false);


        $this->assertEquals(123, $obtained->ExamplePoint->coordinates[0]);

        $object = new GeoJSONObject('ExampleObject');
        $object->setElement($sut, 1);
        $json = $formatter->buildContent($object);

        $this->assertEquals('{ExamplePoint:{"type":"Point","coordinates":[123,456]}}', $json);

    }

} 