<?php

namespace DataTree\examples\GeoJSON;
use DataTree\DataTreeElement;

abstract class Geometry extends GeoJSONObject
{
    private $coordinates;

    abstract protected function validateCoordinates(array $coordinates);

    final public function setCoordinates($coordinates)
    {
        try {
            $this->validateCoordinates($coordinates);
        } catch (\InvalidArgumentException $e) {
            throw $e;
        }
        $this->coordinates = $coordinates;
        $this->dataTree->setChild(new DataTreeElement('coordinates', $coordinates), 1);
    }

    final public function getCoordinates()
    {
        return $this->coordinates;
    }
}
