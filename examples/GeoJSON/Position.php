<?php
namespace DataTree\examples\GeoJSON;

/**
 * Class Position
 * @package DataTree\examples\GeoJSON
 * @see DataTree\tests\examples\PositionTest
 */
class Position extends Geometry
{
    protected function validateCoordinates(array $coordinates)
    {
        if (!$coordinates || !is_array($coordinates) || count($coordinates) < 2) {
            throw new \InvalidArgumentException('coordinates must be an array with 2 or more numeric elements');
        }

        foreach ($coordinates as $val) {
            if (!is_numeric($val)) {
                throw new \InvalidArgumentException('coordinates must be an array with 2 or more numeric elements');
            }
        }
    }



}
