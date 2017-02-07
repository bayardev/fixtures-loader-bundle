<?php

namespace Bayard\Bundle\FixturesLoaderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     *
     * @todo Add others fixtures formats (ex. php, csv, ...)
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bayard');

        $rootNode
            ->children()
                ->arrayNode('data_fixtures')
                    ->children()
                        ->scalarNode('folder')
                            ->info("The folder in which fixtures are stored.")
                            ->cannotBeEmpty()
                            ->defaultValue('/Resources/fixtures/')
                        ->end()
                        ->enumNode('reflection_method')
                            ->info("Determine if take 'namespace' or 'bundle' parameter")
                            ->values(['namespace', 'bundle'])
                            ->cannotBeEmpty()
                            ->defaultValue('bundle')
                        ->end()
                        ->scalarNode('namespace')
                            ->info("The namespace from which fixture folder will be found.")
                        ->end()
                        ->scalarNode('bundle')
                            ->info("The bundle from which fixture folder will be found.")
                        ->end()
                        ->scalarNode('dataset')
                            ->info("The dataset folder name that contains fixtures files to be loaded.")
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                        ->enumNode('format')
                            ->info('The fixtures files format.')
                            ->values(['json'])
                            ->cannotBeEmpty()
                            ->defaultValue('json')
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
