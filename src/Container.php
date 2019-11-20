<?php

namespace Satellite\DI;

use DI\CompiledContainer;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

class Container {
    /**
     * @var \DI\ContainerBuilder
     */
    protected $container_builder;
    /**
     * @var \DI\Container
     */
    protected $container;

    public function __construct($cache = null, $container_class = 'CompiledContainer', $container_parent_class = CompiledContainer::class) {
        $this->container_builder = new ContainerBuilder();

        if($cache) {
            $this->container_builder->enableCompilation($cache, $container_class, $container_parent_class);
        }
        $this->container_builder->addDefinitions([
            ContainerInterface::class => \DI\Container::class,
        ]);
    }

    public function autowire($autowire) {
        $this->container_builder->useAutowiring($autowire);
    }

    public function annotations($annotation) {
        $this->container_builder->useAnnotations($annotation);
    }

    /**
     * @throws \Exception
     * @return \DI\Container
     */
    public function container() {
        if(!$this->container) {
            $this->container = $this->container_builder->build();
        }
        return $this->container;
    }
}
