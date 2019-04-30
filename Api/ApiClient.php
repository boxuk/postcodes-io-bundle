<?php
namespace BoxUk\PostcodesIoBundle\Api;

use GuzzleHttp\Command\Guzzle\GuzzleClient;

/**
 * Class ApiClient
 * @package BoxUk\PostcodesIoBundle\Api
 * Skeleton class for autowiring
 * @method array lookup(array $parameters = ['postcode' => ''])
 * @method array bulkLookup(array $parameters = ['postcodes' => []])
 * @method array reverseGeocode(array $parameters = ['longitude' => '', 'latitude' => '', 'limit' => '', 'radius' => ''])
 * @method array bulkReverseGeocode(array $parameters = [])
 * @method array matching(array $parameters = ['query' => '', 'limit' => ''])
 * @method array validate(array $parameters = ['postcode' => ''])
 * @method array autocomplete(array $parameters = ['postcode' => '', 'limit' => ''])
 * @method array random()
 * @method array outwardCodeLookup(array $parameters = ['postcode' => ''])
 */
class ApiClient extends GuzzleClient
{
}
