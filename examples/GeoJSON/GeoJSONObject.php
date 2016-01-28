<?php
namespace MessageComposite\examples\GeoJSON;

use MessageComposite\xml\GenericMessage;

/**
 * Class GeoJSONObject
 * @package MessageComposite\examples\GeoJSON
 * @link http://geojson.org/geojson-spec.html
 *
 * Here we want to be able to compose objects. Let's extend GenericMessage
 */
class GeoJSONObject extends GenericMessage
{

    const TYPE_GEOMETRY = 'Geometry';
    const TYPE_FEATURE = 'Feature';
    const TYPE_FEATURES_COLLECTION = 'FeatureCollection';

    protected $type;
}
