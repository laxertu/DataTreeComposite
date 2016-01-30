<?php
namespace DataTree\examples\GeoJSON;

use DataTree\DataTree;
use DataTree\DataTreeElement;
use DataTree\OpenDataTree;
use DataTree\OpenDataTreeInterface;

/**
 * Class GeoJSONObject
 * @package DataTree\examples\GeoJSON
 * @link http://geojson.org/geojson-spec.html
 *
 */
abstract class GeoJSONObject extends DataTree
{
    /** Type of Object, Point, LineString, etc */
    protected $type;

    public final function __construct()
    {
        $this->setName('GeoJsonObject');
        $this->setChild(new DataTreeElement('type', $this->type), 0);
    }
}
