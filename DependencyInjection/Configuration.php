<?php

namespace BoxUk\PostcodesIoBundle\DependencyInjection;

use BoxUk\PostcodesIoBundle\Api\ClientFactory;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('box_uk_postcodes_io')
            ->children()
            ->scalarNode('base_url')
            ->defaultValue(ClientFactory::DEFAULT_BASE_URL)
            ->end();

        return $treeBuilder;
    }
}
