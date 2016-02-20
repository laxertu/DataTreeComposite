<?php
namespace DataTree\examples\GeoJSON;

use DataTree\DataTreeElement;
use DataTree\OpenDataTree;

/**
 * Class GeoJSONObject
 * @package DataTree\examples\GeoJSON
 * @link http://geojson.org/geojson-spec.html
 *
 */
abstract class GeoJSONObject
{
    /** @var String Type of Object, 'Point', 'LineString', etc */
    protected $type;

    /** @var  OpenDataTree */
    protected $dataTree;


    public final function __construct()
    {
        $this->dataTree = new OpenDataTree('GeoJsonObject');
        $this->dataTree->setChild(new DataTreeElement('type', $this->type), 0);
    }

    public final function getDataTree()
    {
        return $this->dataTree;
    }

}
