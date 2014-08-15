<?php

namespace BoxUk\PostcodesIoBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * BoxUkPostcodesIoExtension
 */
class BoxUkPostcodesIoExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->setContainerParameters($config, $container);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }

    /**
     * Make some configuration values available to the container.
     *
     * @param array $config The configuration.
     * @param ContainerBuilder $container The container builder.
     */
    protected function setContainerParameters(array $config, ContainerBuilder $container)
    {
        $container->setParameter($this->getAlias() . '.base_url', $config['base_url']);
    }
}
