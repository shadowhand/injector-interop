<?php

namespace Interop\Injector;

interface InjectorInterface
{
    /**
     * Define constructor arguments for a class or alias
     *
     * @param string $spec
     * @param array $args
     *
     * @return self
     */
    public function define($spec, array $args);

    /**
     * Register a invokable to prepare an object instance
     *
     * The invokable may be a PHP callable, the name of a class that has an
     * `__invoke` method, or the name of a class with a non-static method.
     *
     * The invokable must take two arguments: the instantiated object and the
     * current injector.
     *
     * If the invokable returns an object of the same type, it will replace the
     * current instance, to allow immutable objects to be mutated.
     *
     * @param string $spec
     * @param callable|string $invokable
     *
     * @return self
     */
    public function prepare($spec, $invokable);

    /**
     * Register a invokable to create an object instance
     *
     * The invokable may be a PHP callable, the name of a class that has an
     * `__invoke` method, or the name of a class with a non-static method.
     *
     * The invokable must take one argument: the injector.
     *
     * The invokable must return an instance of the specified class.
     *
     * @param string $spec
     * @param callable|string $invokable
     *
     * @return self
     */
    public function delegate($spec, $invokable);

    /**
     * Define an alias for a class
     *
     * @param string $spec
     * @param string $alias
     *
     * @return self
     */
    public function alias($spec, $alias);

    /**
     * Create a new instance of a class and provision it
     *
     * @param string $spec
     *
     * @return object
     */
    public function make($spec);

    /**
     * Share the specified class/instance within the injector context
     *
     * @param string|object $specOrInstance
     *
     * @return self
     */
    public function share($specOrInstance);
}
