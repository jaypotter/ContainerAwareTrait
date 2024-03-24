<?php

declare(strict_types=1);

namespace Potter\Container\Aware;

use \Potter\Cloneable\CloneableInterface, \Psr\Container\ContainerInterface;

trait ContainerAwareTrait 
{
    private ContainerInterface $container;
    
    final public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    final public function hasContainer(): bool
    {
        return $this->has('container');
    }
    
    final protected function setContainer(ContainerInterface $container): void
    {
        $this->container = $container;
    }
    
    final protected function withContainer(ContainerInterface $container): ContainerAwareInterface
    {
        return $this->with('container', $container);
    }
    
    final protected function withoutContainer(): ContainerAwareInterface
    {
        return $this->without('container');
    }
    
    abstract public function has(string $id): bool;
    abstract protected function with(string $id, mixed $entry): CloneableInterface;
    abstract protected function without(string $id): CloneableInterface;
}