<?php

namespace Interop\Injector;

interface ConfigurationInterface
{
    /**
     * Apply some configuration to the injector
     *
     * @param InjectorInterface $injector
     *
     * @return void
     */
    public function apply(InjectorInterface $injector);
}
