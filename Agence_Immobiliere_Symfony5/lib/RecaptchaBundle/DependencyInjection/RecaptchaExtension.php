<?php

namespace Mahdilib\RecaptchaBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class RecaptchaExtension extends Extension {

    public function load(array $configs, ContainerBuilder $container) {

        
        $loader = new YamlFileLoader(
                $container,
                new FileLocator(__DIR__.'/../Resources/config')
                );
        
        $loader->load('services.yml');
        
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter('recaptcha.key', $config['key']);
        $container->setParameter('recaptcha.secret', $config['secret']);
    }

}
