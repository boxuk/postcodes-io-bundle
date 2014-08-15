<?php

namespace BoxUk\PostcodesIoBundle\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;

/**
 * ClientFactory
 */
class ClientFactory
{
    /**
     * @var string The default base URL.
     */
    const DEFAULT_BASE_URL = 'http://api.postcodes.io';

    /**
     * Factory method to create a new GuzzleClient configured to query the postcodes.io API.
     *
     * @param string $baseUrl The base URL to use.
     *
     * @return GuzzleClient A new GuzzleClient.
     */
    public function create($baseUrl = self::DEFAULT_BASE_URL)
    {
        return new GuzzleClient(new Client(), $this->getServiceDescription($baseUrl));
    }

    /**
     * Get the service description.
     *
     * @param string $baseUrl The base URL.
     *
     * @return GuzzleServiceDescription The service description.
     */
    protected function getServiceDescription($baseUrl)
    {
        return new Description(
            array(
                'baseUrl' => $baseUrl,
                'operations' => array(
                    'lookup' => array(
                        'uri' => 'postcodes/{postcode}',
                        'httpMethod' => 'GET',
                        'responseModel' => 'getResponse',
                        'parameters' => array(
                            'postcode' => array(
                                'location' => 'uri',
                                'description' => 'The postcode to look up.',
                                'required' => true
                            )
                        )
                    ),
                    'bulkLookup' => array(
                        'uri' => 'postcodes',
                        'httpMethod' => 'POST',
                        'responseModel' => 'getResponse',
                        'parameters' => array(
                            'postcodes' => array(
                                'location' => 'postField',
                                'description' => 'The postcodes to look up (max 100).',
                                'required' => true
                            )
                        )
                    ),
                    'reverseGeocode' => array(
                        'uri' => 'postcodes/lon/{longitude}/lat/{latitude}',
                        'httpMethod' => 'GET',
                        'responseModel' => 'getResponse',
                        'parameters' => array(
                            'longitude' => array(
                                'location' => 'uri',
                                'description' => 'The longitude to look up.',
                                'required' => true
                            ),
                            'latitude' => array(
                                'location' => 'uri',
                                'description' => 'The latitude to look up.',
                                'required' => true
                            ),
                            'limit' => array(
                                'location' => 'query',
                                'description' => 'Limit the number of postcodes returned (default 10, max 100).',
                                'required' => true
                            ),
                            'radius' => array(
                                'location' => 'query',
                                'description' => 'Limit the postcodes returned in metres (default 100, max 1000).',
                                'required' => true
                            )
                        )
                    ),
                    'bulkReverseGeocode' => array(
                        'uri' => 'postcodes',
                        'httpMethod' => 'POST',
                        'responseModel' => 'getResponse',
                        'parameters' => array(
                            'geolocations' => array(
                                'location' => 'postField',
                                'description' => 'The latitude and longitude coordinates to look up.',
                                'required' => true
                            )
                        )
                    ),
                    'matching' => array(
                        'uri' => 'postcodes',
                        'httpMethod' => 'GET',
                        'responseModel' => 'getResponse',
                        'parameters' => array(
                            'query' => array(
                                'location' => 'query',
                                'description' => 'The postcode query.'
                            ),
                            'limit' => array(
                                'location' => 'query',
                                'description' => 'Limit the number of postcodes returned (default 10, max 100).'
                            )
                        )
                    ),
                    'validate' => array(
                        'uri' => 'postcodes/{postcode}/validate',
                        'httpMethod' => 'GET',
                        'responseModel' => 'getResponse',
                        'parameters' => array(
                            'postcode' => array(
                                'location' => 'uri',
                                'description' => 'The postcode to validate.',
                                'required' => true
                            )
                        )
                    ),
                    'autocomplete' => array(
                        'uri' => 'postcodes/{postcode}/autocomplete',
                        'httpMethod' => 'GET',
                        'responseModel' => 'getResponse',
                        'parameters' => array(
                            'postcode' => array(
                                'location' => 'uri',
                                'description' => 'The partial postcode to autocomplete.',
                                'required' => true
                            ),
                            'limit' => array(
                                'location' => 'query',
                                'description' => 'Limit the number of postcodes returned (default 10, max 100).'
                            )
                        )
                    ),
                    'random' => array(
                        'uri' => 'random/postcodes',
                        'httpMethod' => 'GET',
                        'responseModel' => 'getResponse',
                    ),
                    'outwardCodeLookup' => array(
                        'uri' => 'outcodes/{outcode}',
                        'httpMethod' => 'GET',
                        'responseModel' => 'getResponse',
                        'parameters' => array(
                            'outcode' => array(
                                'location' => 'uri',
                                'description' => 'The outward code (first half of postcode) to get location data for.',
                                'required' => true
                            )
                        )
                    )
                ),
                'models' => array(
                    'getResponse' => array(
                        'type' => 'object',
                        'properties' => array(
                            'statusCode' => array(
                                'location' => 'statusCode'
                            )
                        ),
                        'additionalProperties' => array(
                            'location' => 'json'
                        )
                    )
                )
            )
        );
    }
}
