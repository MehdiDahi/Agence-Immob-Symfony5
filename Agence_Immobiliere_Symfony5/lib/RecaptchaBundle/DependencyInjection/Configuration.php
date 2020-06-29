<?php

namespace Mahdilib\RecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface {

    public function getConfigTreeBuilder() {

        $treeBuilder = new TreeBuilder('recaptcha');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
                ->children()
                ->scalarNode('key')
                ->isRequired()
                ->cannotBeEmpty()->end()
                ->scalarNode('secret')
                ->isRequired()
                ->cannotBeEmpty()->end()
                ->end()
        ;
        return $treeBuilder;
    }

}
