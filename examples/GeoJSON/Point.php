<?php
namespace MessageComposite\examples\GeoJSON;

use MessageComposite\xml\MessageElement;

class Point extends GeoJSONObject
{
    protected $type = 'Point';

    public function __construct($name, $coordinates)
    {
        $this->setChild(new MessageElement('type', $this->type), 0);
        $this->setName($name);
        $this->setCoordinates($coordinates);
    }

    public function setCoordinates($coordinates)
    {
        $this->setChild(new MessageElement('coordinates', $coordinates), 1);
    }
}
