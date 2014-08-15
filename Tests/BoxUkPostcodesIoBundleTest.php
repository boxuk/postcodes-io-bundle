<?php

namespace BoxUk\PostcodesIoBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * BoxUkPostcodesIoBundleTest
 */
class BoxUkPostcodesIoBundleTest extends WebTestCase
{
    /**
     * @var Symfony\Component\DependencyInjection\Container The container.
     */
    protected $container;

    /**
     * Set up.
     */
    public function setUp()
    {
        $client = static::createClient();

        $this->container = $client->getContainer();
    }

    public function testFactoryServiceExists()
    {
        $clientFactory = $this->container->get('box_uk_postcodes_io.client_factory');

        $this->assertInstanceOf('BoxUk\PostcodesIoBundle\Api\ClientFactory', $clientFactory);
    }

    public function testClientServiceExists()
    {
        $client = $this->container->get('box_uk_postcodes_io.client');

        $this->assertInstanceOf('GuzzleHttp\Command\Guzzle\GuzzleClient', $client);
    }
}
