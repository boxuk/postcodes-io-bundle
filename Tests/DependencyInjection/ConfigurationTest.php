<?php

namespace BoxUk\PostcodesIoBundle\Tests\DependencyInjection;

use BoxUk\PostcodesIoBundle\Api\ClientFactory;
use BoxUk\PostcodesIoBundle\DependencyInjection\Configuration;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Config\Definition\Processor;

/**
 * ConfigurationTest
 */
class ConfigurationTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultValuesAreAppliedWhenNotSpecified()
    {
        $config = $this->process(array());

        $this->assertEquals(ClientFactory::DEFAULT_BASE_URL, $config['base_url']);
    }

    public function testDefaultValuesCanBeOverridden()
    {
        $baseUrl = 'http://example.com';

        $config = $this->process(array(array('base_url' => $baseUrl)));

        $this->assertEquals($baseUrl, $config['base_url']);
    }

    /**
     * Processes an array of configurations and returns a compiled version.
     *
     * @param array $configs An array of raw configurations.
     *
     * @return array A normalised array.
     */
    protected function process(array $configs)
    {
        $processor = new Processor();

        return $processor->processConfiguration(new Configuration(), $configs);
    }
}
