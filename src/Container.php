<?php

namespace Satellite\DI;

use DI\ContainerBuilder;

class Container extends ContainerBuilder {
    /**
     * @var \DI\ContainerBuilder
     */
    protected $container_builder;

    /**
     * @var \DI\Container
     */
    protected $container;

    public function __construct(string $containerClass = \DI\Container::class) {
        parent::__construct($containerClass);
    }

    /**
     * @throws \Exception
     * @return \DI\Container
     */
    public function container() {
        if(!$this->container) {
            $this->container = $this->build();
        }
        return $this->container;
    }
}
