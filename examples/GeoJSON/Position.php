<?php
namespace MessageComposite\examples\GeoJSON;

/**
 * Class Position
 * @package MessageComposite\examples\GeoJSON
 * @see MessageComposite\tests\examples\PositionTest
 */
class Position extends GeoJSONObject
{

    private $coordinates = [];

    public function __construct(array $coordinates = [])
    {
        if (!$coordinates || !is_array($coordinates) || count($coordinates) < 2) {
            throw new \InvalidArgumentException('coordinates must be an array with 2 or more numeric elements');
        }

        foreach ($coordinates as $val) {
            if (!is_numeric($val)) {
                throw new \InvalidArgumentException('coordinates must be an array with 2 or more numeric elements');
            }
        }

        $this->coordinates = $coordinates;
    }

    public function getCoordinates()
    {
        return $this->coordinates;
    }
}
