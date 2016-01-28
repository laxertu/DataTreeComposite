<?php
namespace MessageComposite\examples\GeoJSON;

use MessageComposite\xml\MessageElement;

class Point extends GeoJSONObject
{
    protected $type = 'Point';

    public function __construct($name, $coordinates)
    {
        $this->setElement(new MessageElement('type', $this->type), 0);
        $this->setName($name);
        $this->setCoordinates($coordinates);
    }

    public function setCoordinates($coordinates)
    {
        $this->setElement(new MessageElement('coordinates', $coordinates), 1);
    }
}
