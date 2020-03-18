<?php
/*
 * This file is part of the phpToolBox package.
 *
 * (c) Brack Romain <cyberomulus.me@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Cyberomulus\PhpToolbox\tests;

use Cyberomulus\PhpToolbox\Datetime;
use Cyberomulus\PhpToolbox\IO;
use Cyberomulus\PhpToolbox\PhpToolbox;
use Cyberomulus\PhpToolbox\Text;
use PHPUnit\Framework\TestCase;

/**
 * Test class for Cyberomulus\PhpToolbox\PhpToolbox
 *
 * @package	Cyberomulus\PhpToolbox\tests
 * @author	Brack Romain <http://www.cyberomulus.me>
 */
class PhpToolboxTest extends TestCase
	{
	/**
	 * Test all class getters
	 */
	public function testGetters()
		{
		$phpToolBox = new PhpToolbox();

		// test getter for Text Class
		$this->assertNotNull($phpToolBox->getText());
		$this->assertInstanceOf(Text::class, $phpToolBox->getText());

		// test getter for IO class
		$this->assertNotNull($phpToolBox->getIO());
		$this->assertInstanceOf(IO::class, $phpToolBox->getIO());

		// test getter for Datetime class
		$this->assertNotNull($phpToolBox->getDatetime());
		$this->assertInstanceOf(Datetime::class, $phpToolBox->getDatetime());
		}
	}
