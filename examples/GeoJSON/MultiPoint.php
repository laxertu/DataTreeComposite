<?php
namespace DataTree\examples\GeoJSON;


use DataTree\Formatter\FormattableInterface;

class MultiPoint extends Geometry
{
    private $pointCounter = 0;
    protected $type = 'MultiPoint';

    final public function addPoint(Position $point)
    {
        $points = $this->getCoordinates();
        $points[$this->pointCounter] = $point->getCoordinates();
        $this->setCoordinates($points);
        $this->pointCounter++;
    }

    protected function validateCoordinates(array $coordinates)
    {



    }

}
