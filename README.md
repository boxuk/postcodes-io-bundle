PostcodesIoBundle
=================

@todo Travis build image.

A bundle for querying the [postcodes.io](http://postcodes.io) web service.

[https://github.com/BoxUk/postcodes-io-bundle](https://github.com/BoxUk/postcodes-io-bundle)

[License](LICENSE)


Services
--------

This bundle adds two services to your container:

* `box_uk_postcodes_io.client` A [GuzzleHttp\Client](https://github.com/guzzle/guzzle-services) configured to query the postcodes.io service.
* `box_uk_postcodes_io.client_factory` A factory used to create instances of the client.


Usage
-----

Inject the `box_uk_postcodes_io.client` service into your controller/class as you would any other service.  Once you have the instance of the client, you can call the methods documented below on it, passing any parameters as an associative array.

The response will be a `GuzzleHttp\Command\Model` object, which you can access as an array, e.g. `echo $response['result']['latitude']`.  Alternatively, you can just call `$response->toArray()` to get an array representation of the response.  For further documentation on the structure of the response, please see [the postcodes.io documentation](http://postcodes.io/docs#Data).


Methods
-------

lookup()
--------
[API documentation](http://postcodes.io/docs#Postcode-Lookup)

Lookup data about a particular postcode.

__Parameters:__
* `postcode` _(Required)_: The postcode.

__Example:__
```php
$response = $client->lookup(array('postcode' => 'CF10 1DD'));
```


bulkLookup()
--------
[API documentation](http://postcodes.io/docs#Bulk-Postcode-Lookup)

Lookup data about a set of postcodes.

__Parameters:__
* `postcodes` _(Required)_: An array of postcodes (max 100).

__Example:__
```php
$response = $client->bulkLookup(array('postcodes' => array('CF10 1DD', 'W1B 4BD'));
```


reverseGeocode()
--------
[API documentation](http://postcodes.io/docs#Geocode-Postcode)

Get data for postcodes nearest a given latitude/longitude coordinate.

__Parameters:__
* `latitude` _(Required)_: The latitude.
* `longitude` _(Required)_: The longitude.
* `limit` _(Optional)_: The maximum number of postcodes to return (default 10, max 100).
* `radius` _(Optional)_: The radius in metres in which to find postcodes (default 100, max 1000).

__Example:__
```php
$response = $client->reverseGeocode(array('latitude' => 51.481667, 'longitude' => -3.182155);
```


bulkReverseGeocode()
--------
[API documentation](http://postcodes.io/docs#Geocode-Postcode)

Bulk translation of latitude/longitude coordinates into postcode data.

__Parameters:__
* `geolocations` _(Required)_: The geolocations to look up (maximum 100).  This parameter should be an array, each element with the following keys:

    * `latitude` _(Required)_: The latitude.
    * `longitude` _(Required)_: The longitude.
    * `limit` _(Optional)_: The maximum number of postcodes to return (default 10, max 100).
    * `radius` _(Optional)_: The radius in metres in which to find postcodes (default 100, max 1000).

__Example:__
```php
$response = $client->bulkReverseGeocode(
    array(
        'geolocations' => array(
            array('latitude' => 51.481667, 'longitude' => -3.182155),
            array('latitude' => 51.88328, 'longitude' => -3.43684, 'limit' => 5, 'radius' => 500)
        )
    )
);
```


matching()
--------
[API documentation](http://postcodes.io/docs#Postcode-Query)

Find postcodes matching a given query.

__Parameters:__
* `query` _(Optional)_: The postcode query, e.g. 'CF10'.
* `limit` _(Optional)_: The maximum number of postcodes to return (default 10, max 100).

__Example:__
```php
$response = $client->matching(array('query' => 'CF10', 'limit' => 20);
```


validate()
--------
[API documentation](http://postcodes.io/docs#Postcode-Validation)

Validate a postcode.

__Parameters:__
* `postcode` _(Required)_: The postcode to validate.

__Example:__
```php
$response = $client->validate(array('postcode' => 'CF10 1DD');
```


autocomplete()
--------
[API documentation](http://postcodes.io/docs#Postcode-Autocomplete)

Get a list of postcodes to autocomplete a partial postcode.

__Parameters:__
* `postcode` _(Required)_: The postcode to autocomplete.
* `limit` _(Optional)_: The maximum number of postcodes to return (default 10, max 100).

__Example:__
```php
$response = $client->autocomplete(array('postcode' => 'CF10', 'limit' => 20);
```


random()
--------
[API documentation](http://postcodes.io/docs#Random-Postcode)

Get data for a random postcode.

__Parameters:__
None.

__Example:__
```php
$response = $client->random();
```


outwardCodeLookup()
--------
[API documentation](http://postcodes.io/docs#Show-Outcode)

Get data for the specified "outward code" (first half of postcode).

__Parameters:__
* `outcode` _(Required)_: The outward code (first half of postcode) to get location data for.

__Example:__
```php
$response = $client->outwardCodeLookup(array('outcode' => 'CF10');
```
