# phpToolbox

Simple php toolbox for not to reinvent the wheel!

## Why this library ?

Every day, we write the same functions for our different projects.  
This library contains a multiple functions so as not to have to write them each time.

It also brings some advantages:

* All functions is tested by phpunit
* The functions are organized in a structured way in special classes.  
You can use a single class with a simple `new classOne()` or access the different class by a main class (useful for declaring as a service in a framework)
* A documentation with phpdoc

## Requirements

* php 5.6 or higher

## Installation

Download whith composer :

    composer require cyberomulus/php-toolbox

## How to use ?

#### By single class

TODO

#### By main class

TODO

## Documentation

All functions have a phpdoc and doc inline.

In the future, the phpdoc will be available in HTML on my server.  
In the meantime, your IDE should be able to view phpdoc directly

## Class list

* [PhpToolbox](docs/00-PhpToolBox.md) : This class contains a getter for each of the individual classes.
If you want to use this lib as a framework service, you can declare this class to use a single service

## Want more ?

#### You just have to ask

You can request a new function in [issue](https://github.com/cyberomulus/phpToolbox/issues)

#### Contribute

Your pull requests are welcome!!  
Sharing is the strength of this lib.

## Contributors

* Cyberomulus

## License

This library is open-source software licensed under the [MIT license](http://opensource.org/licenses/MIT).