<?php

namespace BoxUk\PostcodesIoBundle\Tests\DependencyInjection;

use BoxUk\PostcodesIoBundle\Api\ClientFactory;
use BoxUk\PostcodesIoBundle\DependencyInjection\BoxUkPostcodesIoExtension;
use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;

/**
 * BoxUkPostcodesIoExtensionTest
 */
class BoxUkPostcodesIoExtensionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var string The name of the configuration alias for the bundle.
     */
    const BUNDLE_CONFIG_ALIAS = 'box_uk_postcodes_io';

    /**
     * @var BoxUkPostcodesIoExtension The extension to test.
     */
    protected $extension;

    /**
     * @var ContainerBuilder A ContainerBuilder.
     */
    protected $containerBuilder;

    /**
     * Set up.
     */
    public function setUp()
    {
        $this->extension = new BoxUkPostcodesIoExtension();

        $this->containerBuilder = new ContainerBuilder();
    }

    public function testLoadAddsDefaultParameterValuesToTheContainer()
    {
        $parameterName = self::BUNDLE_CONFIG_ALIAS . '.base_url';

        $this->extension->load(array(), $this->containerBuilder);

        $this->assertEquals(ClientFactory::DEFAULT_BASE_URL, $this->containerBuilder->getParameter($parameterName));
    }

    public function testLoadAddsOverrideParameterValuesToTheContainer()
    {
        $baseUrl = 'http://example.com';

        $parameterName = self::BUNDLE_CONFIG_ALIAS . '.base_url';

        $this->extension->load(array(array('base_url' => $baseUrl)), $this->containerBuilder);

        $this->assertEquals($baseUrl, $this->containerBuilder->getParameter($parameterName));
    }
}
