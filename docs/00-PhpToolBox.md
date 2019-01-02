# PhpToolbox class

This class contains a getter for each of the individual classes.  
If you want to use this lib as a framework service, you can declare this class to use a single service

If you use Symfony >4.0 you can use the bundle [cyberomulus/phpToolboxBundle](https://github.com/cyberomulus/phpToolboxBundle) for inject this class in a service.

## function list

* `getText()` : return an instance of [Cyberomulus\PhpToolbox\Text](01-text.md)
* `getIO()` :  return an instance of [Cyberomulus\PhpToolbox\IO](02-io.md)
* `getDatetime()` :  return an instance of [Cyberomulus\PhpToolbox\Datetime](03-datetime.md)