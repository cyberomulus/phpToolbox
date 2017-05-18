# phpToolbox

[![Build Status](https://img.shields.io/travis/cyberomulus/phpToolbox.svg?style=flat-square)](https://travis-ci.org/cyberomulus/phpToolbox)

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

For use a single class, you can simply create an instance to use it.

For example, use the functions of manipulation and verification of texts:

    $textManip = new Cyberomulus\PhpToolbox\Text();
    $bool = $textManip->startWith("simple example", "example");

#### By main class (for use by service)

If you use a framework, a good practice is to declare this lib as a service.  
In order not to have to declare as many services as class, a class provider exists: `Cyberomulus\PhpToolbox\PhpToolbox\`.

Once the service is created, you will have access to each class containing the functions:

    $textManip = $this->getService("phpToolBox")->getText();
    $bool = $textManip->startWith("simple example", "example");

## Class list

* [PhpToolbox](docs/00-PhpToolBox.md) : This class contains a getter for each of the individual classes.
If you want to use this lib as a framework service, you can declare this class to use a single service
* [Text](docs/01-text.md) : This class contains useful functions for manipulating and verifying text
* [IO](docs/02-io.md) : This class contains useful functions for read and write (on filesystem, console, network)

## Documentation

All functions have a phpdoc and doc inline.

In the future, the phpdoc will be available in HTML on my server.  
In the meantime, your IDE should be able to view phpdoc directly

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