<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.12.2014
 * Time: 1:03
 */

namespace Acme\ExchangeRateBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('acme_exchange_rate');

        $rootNode
            ->children()
                ->scalarNode('provider')->end()
            ->end()
        ;
        return $treeBuilder;
    }
}