<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * AppKernel
 */
class AppKernel extends Kernel
{
    /**
     * {@inheritDoc}
     */
    public function registerBundles()
    {
        return array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new BoxUk\PostcodesIoBundle\BoxUkPostcodesIoBundle()
        );
    }

    /**
     * {@inheritDoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config.yml');
    }
}
