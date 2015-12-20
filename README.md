# Injector Configuration Interoperability

*injector-interop* tries to identify and standardize features used by *dependency injector configuration* to achieve
interoperability. It is an alternative to [definition-interop][definition-interop].

[definition-interop]: https://github.com/container-interop/definition-interop

Through discussions and trials, we try to create a standard, made of common interfaces but also recommendations.

If PHP projects that provide injector implementations begin to adopt these common standards, then PHP applications
and projects that use injector configuration can depend on the common interfaces instead of specific implementations.
This facilitates a high-level of interoperability and flexibility that allows users to use *any* injector implementation
to configure packages.

The work done in this project is not officially endorsed by the [PHP-FIG](http://www.php-fig.org/).
We adhere to the spirit and ideals of PHP-FIG, and hope this project will pave the way for one or more future PSRs.

## An Example

With [PSR-7][psr-7] there are many implementations of HTTP message interfaces, including [Zend Diactoros][diactoros].
The following could be used to tell an application to use this implementation of PSR-7:

[psr-7]: http://www.php-fig.org/psr/psr-7/
[diactoros]: https://github.com/zendframework/zend-diactoros

```php
use Interop\Injector\InjectorInterface;
use Interop\Injector\ConfigurationInterface;

class DiactorosConfiguration implements ConfigurationInterface
{
    /**
     * @inheritDoc
     */
    public function apply(InjectorInterface $injector)
    {
        $injector->alias(
            'Psr\Http\Message\ResponseInterface',
            'Zend\Diactoros\Response'
        );

        $injector->alias(
            'Psr\Http\Message\RequestInterface',
            'Zend\Diactoros\Request'
        );

        $injector->alias(
            'Psr\Http\Message\ServerRequestInterface',
            'Zend\Diactoros\ServerRequest'
        );

        $injector->delegate(
            'Zend\Diactoros\ServerRequest',
            'Zend\Diactoros\ServerRequestFactory::fromGlobals'
        );
    }
}
```
