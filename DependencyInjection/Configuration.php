<?php

namespace FL\QBJSParserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('qbjs_parser');

        $rootNode
            ->children()
                ->arrayNode('builders')
                    ->prototype('array')->cannotBeEmpty()
                        ->children()
                            ->scalarNode('class')->isRequired()->cannotBeEmpty()->end()
                            ->scalarNode('human_readable_name')->isRequired()->cannotBeEmpty()->end()
                            ->arrayNode('filters')->isRequired()->cannotBeEmpty()
                                ->prototype('array')->cannotBeEmpty()
                                    ->children()
                                        ->scalarNode('id')->isRequired()->cannotBeEmpty()->end()
                                        ->scalarNode('label')->isRequired()->cannotBeEmpty()->end()
                                        ->scalarNode('type')->isRequired()->cannotBeEmpty()->end()
                                        ->arrayNode('operators')->cannotBeEmpty()
                                            ->prototype('scalar')
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('doctrine_classes_and_mappings')
                    ->prototype('array')->cannotBeEmpty()
                        ->children()
                            ->scalarNode('class')->isRequired()->cannotBeEmpty()->end()
                            ->arrayNode('properties')->isRequired()->cannotBeEmpty()
                                ->prototype('scalar')
                                ->end()
                            ->end()
                            ->arrayNode('association_classes')->isRequired()->cannotBeEmpty()
                                ->prototype('scalar')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;



        return $treeBuilder;
    }
}
