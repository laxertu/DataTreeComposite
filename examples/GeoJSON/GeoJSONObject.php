<?php
namespace MessageComposite\examples\GeoJSON;

use MessageComposite\GenericMessage;

/**
 * Class GeoJSONObject
 * @package MessageComposite\examples\GeoJSON
 * @link http://geojson.org/geojson-spec.html
 */
class GeoJSONObject extends GenericMessage
{

    const TYPE_GEOMETRY = 'Geometry';
    const TYPE_FEATURE = 'Feature';
    const TYPE_FEATURES_COLLECTION = 'FeatureCollection';

    protected $type;
}
