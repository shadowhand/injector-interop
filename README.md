# Injector Interoperability

*injector-interop* tries to identify and standardize features used by *dependency injectors*
to achieve interoperability. It is an alternative to [container-interop][container-interop].

[container-interop]: https://github.com/container-interop/container-interop

Through discussions and trials, we try to create a standard, made of common interfaces but also recommendations.

If PHP projects that provide injector implementations begin to adopt these common standards, then PHP
applications and projects that use injectors can depend on the common interfaces instead of specific
implementations. This facilitates a high-level of interoperability and flexibility that allows users use
*any* injector implementation that implements these interfaces.

The work done in this project is not officially endorsed by the [PHP-FIG](http://www.php-fig.org/).
We adhere to the spirit and ideals of PHP-FIG, and hope this project will pave the way for one or more future PSRs.
