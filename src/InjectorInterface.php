<?php

namespace Interop\Injector;

interface InjectorInterface
{
    /**
     * Define instantiation directives for a class or alias
     *
     * @param string $spec
     * @param array $args
     *
     * @return self
     */
    public function define($spec, array $args);

    /**
     * Register a callable to prepare an object instance
     *
     * The callable must take two arguments: the instantiated object and the
     * current injector.
     *
     * If the callable returns an object of the same type, it will replace the
     * current instance, to allow immutable objects to be mutated.
     *
     * @param string $spec
     * @param callable $using
     *
     * @return self
     */
    public function prepare($spec, callable $using);

    /**
     * Register a callable to create an object instance
     *
     * The callable must take one argument: the injector.
     *
     * The callable must return an instance of the specified class.
     *
     * @param string $spec
     * @param callable $using
     *
     * @return self
     */
    public function delegate($spec, callable $using);

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
     * @param array $args
     *
     * @return object
     */
    public function make($spec, array $args = []);

    /**
     * Share the specified class/instance within the injector context
     *
     * @param string|object $specOrInstance
     *
     * @return self
     */
    public function share($specOrInstance);
}
